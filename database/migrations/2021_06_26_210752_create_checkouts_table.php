<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer('order_quantity');
            $table->decimal('order_total', $precision = 8, $scale = 2);
            $table->text('order_description');
            $table->string('payment_type');
            $table->string('collection_time');
            $table->string('collection_day');
            $table->integer('total_items');
            $table->string('paypal_orderid')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('checkouts');
    }
}
