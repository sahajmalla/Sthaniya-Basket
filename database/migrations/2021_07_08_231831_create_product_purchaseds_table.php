<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchaseds', function (Blueprint $table) {
            $table->id();
            $table->integer('prod_quantity');
            $table->decimal('total_price', $precision = 8, $scale = 2);
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('checkout_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchaseds');
    }
}
