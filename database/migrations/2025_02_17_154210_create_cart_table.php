<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_Id')->nullable();

            $table->string('product_Name');
            
            $table->integer('product_Price');
            
            $table->integer('quantity')->default(1);
            $table->integer('total_Price')->default(0);
            $table->string('image_Path');

            $table->timestamps();

            $table->foreign('product_Id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
