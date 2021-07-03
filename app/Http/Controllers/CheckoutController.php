<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class CheckoutController extends Controller
{
    public function index(Request $request) {

        $total_price = 0.0;
        $total_items_quantity = 0;

        // Retrive products related to user from cart.
        $cartAndProductRecords = DB::table('products')
        ->join('carts', function ($join) {
            $join->on('carts.product_id', '=', 'products.id')
                ->where('carts.customer_id', '=', auth()->user()->customers->first()->id);
        })
        ->get();

        foreach ($cartAndProductRecords as $cartAndProductRecord) {
            $total_price += ($cartAndProductRecord->price * $cartAndProductRecord->product_quantity);
            $total_items_quantity += $cartAndProductRecord->product_quantity;
        }

        $total_price_string_2dp = number_format($total_price, 2);

        // dd(Carbon::now()->toDateString()." | ".Carbon::now()->format('l'));

        // Current date and time:
        $currentDateTime = Carbon::now()->addDays(2);

        $firstTimeSlot = Carbon::parse('10:00:00')->addDays(1);
        $secondTimeSlot = Carbon::parse('01:00:00')->addDays(1);
        $thirdTimeSlot = Carbon::parse('04:00:00')->addDays(1);

        // dd($currentDateTimePlus24Hrs);
        // dd(((strtotime($currentDateTimePlus24Hrs) - 24 * 60 * 60) / 60 / 60)." ".strtotime($currentDateTime) / 60 / 60);
        // dd($currentDateTime->format('l')." | ".date('h:i A', strtotime($currentDateTime)));

        return view('checkout', [
            "cartAndProductRecords" => $cartAndProductRecords,
            'total_price' => $total_price_string_2dp,
            'total_items_quantity' => $total_items_quantity,
            'currentDateTime' => $currentDateTime,
        ]);
    }

    public function store(Request $request, float $totalPrice, int $totalQuantity, 
                            int $totalItems, Carbon $currentDateTime) {

        $orderDescription = "A total of ".$totalItems." "
            .Str::plural('item', $totalItems)." with a total quantity of ".$totalQuantity
            ." and a total price of €".number_format((float)$totalPrice, 2, '.', '').".";
        
        // Creating a checkout record through the customer:
        $order = auth()->user()->customers->first()->checkouts()->create([
                    'order_total' => $totalPrice,
                    'order_quantity' => $totalQuantity,
                    'total_items' => $totalItems,
                    'payment_type' => $request->payment,
                    'collection_time' => $request->collectionTime,
                    'collection_day' => $request->collectionDay,
                    'order_description' => $orderDescription,
                ]); 

        if ($request->payment === 'PayPal') {

            return redirect()->route('paypal.checkout', $order->id);

        }

        return redirect()->route('order');

    }

}   
