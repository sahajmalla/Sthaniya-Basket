<?php

namespace App\Http\Controllers;

use App\Order;
use App\Models\Cart;
use App\Models\Trader;
use App\Mail\OrderPaid;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Mail\OrderSuccessful;
use App\Mail\ProductOutOfStock;
use App\Services\PaypalService;
use Illuminate\Support\Facades\DB;
use App\Models\ProductQuantitySales;
use Illuminate\Support\Facades\Mail;

class PayPalController extends Controller
{
    private $paypalService;

    function __construct(PaypalService $paypalService){

        $this->paypalService = $paypalService;

    }


    public function getExpressCheckout($orderId)
    {

        $response = $this->paypalService->createOrder($orderId);

        if($response->statusCode !== 201) {
            abort(500);
        }

        $order = Checkout::find($orderId);
        $order->paypal_orderid = $response->result->id;
        $order->save();

        foreach ($response->result->links as $link) {
            if($link->rel == 'approve') {
                return redirect($link->href);
            }
        }

    }


    public function cancelPage()
    {
        dd('payment failed');
    }


    public function getExpressCheckoutSuccess(Request $request, $orderId)
    {
        $order = Checkout::find($orderId);

        $response = $this->paypalService->captureOrder($order->paypal_orderid);

        if ($response->result->status == 'COMPLETED') {

            $order->is_paid = 1;
            $order->save();

            // Decrease product quantity.
            $cartAndProductRecords = DB::table('products')
            ->join('carts', function ($join) {
                $join->on('carts.product_id', '=', 'products.id')
                    ->where('carts.customer_id', '=', auth()->user()->customers->first()->id);
            })
            ->get();

            foreach ($cartAndProductRecords as $cartAndProductRecord) {

                $product = Product::find($cartAndProductRecord->product_id);
                
                // Decrease product quantity.
                $productOldQuantity = $product->prod_quantity;

                $product->prod_quantity = $product->prod_quantity - $cartAndProductRecord->product_quantity;
                $product->save();

                // Create data to report table.
                $productsSoldQuantity = $productOldQuantity - $product->prod_quantity;
                $productSales = $productsSoldQuantity * $product->price;

                $this->generateTraderReport($product, $productsSoldQuantity, $productSales);

                // Create or update the product's total sales and quantity sold details.
                $this->createOrUpdateProductSales($product, $product->trader, $productsSoldQuantity, $productSales);

                // If product quantity is 0 after sales, then send an email to trader.
                if ($product->prod_quantity === 0) {
                    Mail::to($product->trader->user)->send(new ProductOutOfStock($product, $product->trader->user));
                }

            }
            
            $this->clearCustomerCartAndSendEmail($order);

            return redirect()->route('home')->with('order-success', 'Your order has been successfully placed.');

        }

        return redirect()->route('home')->withError('Payment UnSuccessful! Something went wrong!');

    }


    public function generateTraderReport(Product $product, int $productsSoldQuantity, float $productSales) {

        // Generating product sales report for trader.
        $product->trader->reports()->create([
            'report_type' => 'daily',
            'report_sales_quantity' => $productsSoldQuantity,
            'report_earnings' => $productSales,
        ]);

    }


    public function createOrUpdateProductSales(Product $product, Trader $trader,
        int $productsSoldQuantity, float $productSales) {
            
        // Update total earnings and total product sold data in product_quantity_sales:

        $productQuantitySalesRecords = ProductQuantitySales::get()->where('product_id', $product->id)
        ->where('trader_id', $product->trader->id);      

        if ($productQuantitySalesRecords->count()) {

            // If product's sales has a record in the ProductQuantitySales table, 
            // update the existing data.   

            foreach ($productQuantitySalesRecords as $productQuantitySalesRecord) {

                $productQuantitySalesRecord->total_quantity_sold += $productsSoldQuantity;
                $productQuantitySalesRecord->total_earnings += $productSales; 
                $productQuantitySalesRecord->save();

            }

        }else {

            // Else, create a new data for the product's sales record.

            $product->productQuantitySales()->create([
            'total_quantity_sold' => $productsSoldQuantity,
            'total_earnings' => $productSales,
            'trader_id' => $product->trader->id,
            ]);

        }
    }

    
    public function clearCustomerCartAndSendEmail(Checkout $order) {

        // Before clearing cart, add to the product_purchased table the items the user bought.
        $userItemsInCart = Cart::get()->where('customer_id', auth()->user()->customers->first()->id);

        foreach ($userItemsInCart as $userItem) {
            
            $product = Product::find($userItem->product_id);

            $productsPurchased = $product->productPurchaseds()->create([
                'prod_quantity' => $userItem->product_quantity,
                'total_price' => $userItem->total_price * $userItem->product_quantity, 
                'customer_id' => auth()->user()->customers->first()->id, 
                'checkout_id' => $order->id,
            ]); 

        }

        // Clear cart items for the current customer.
        Cart::where('customer_id', auth()->user()->customers->first()->id)->delete();

        // Send email to user.
        Mail::to(auth()->user())->send(new OrderSuccessful($order));

    }

}
