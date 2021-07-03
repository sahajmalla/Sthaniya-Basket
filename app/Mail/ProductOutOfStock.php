<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Trader;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductOutOfStock extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $userTrader;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product, User $userTrader)
    {
        $this->product = $product;
        $this->userTrader = $userTrader;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.products.out_of_stock')
                        ->subject('Product out of stock.');
    }
}
