<?php

namespace App\Services;

use App\Order;
use App\Models\Checkout;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalService
{
    private $client;

    function __construct()
    {
        $environment = new SandboxEnvironment(env('PAYPAL_SANDBOX_CLIENT_ID'), env('PAYPAL_SANDBOX_CLIENT_SECRET'));
        $this->client = new PayPalHttpClient($environment);
    }

    public function createOrder($orderId)
    {

        $request = new OrdersCreateRequest();
        $request->headers["prefer"] = "return=representation";
        $request->body = $this->simpleCheckoutData($orderId);

        return $this->client->execute($request);
    }

    public function captureOrder($paypalOrderId)
    {
        $request = new OrdersCaptureRequest($paypalOrderId);

        return $this->client->execute($request);
    }

    private function simpleCheckoutData($orderId)
    {
        $order = Checkout::find($orderId);

        return [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => 'webmall_'. uniqid(),
                "amount" => [
                    "value" => $order->order_total,
                    "currency_code" => "GBP"
                ]
            ]],
            "application_context" => [
                "cancel_url" => route('paypal.cancel'),
                "return_url" => route('paypal.success', $orderId)
            ]
            ];
    }

}