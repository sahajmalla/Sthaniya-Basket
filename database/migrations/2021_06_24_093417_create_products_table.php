<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prod_name');
            $table->string('prod_type');
            $table->text('prod_descrip');
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->string('prod_image');
            $table->integer('prod_quantity');
            $table->foreignId('shop_id')->constrained()->onDelete('cascade');
            $table->foreignId('trader_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
