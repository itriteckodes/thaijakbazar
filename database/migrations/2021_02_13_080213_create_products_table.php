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
            $table->foreignId('product_image_id')->nullable();
            $table->foreignId('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreignId('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subcat_id');
            $table->foreign('subcat_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('handle');
            $table->bigInteger('price');
            $table->bigInteger('old_price');
            $table->text('description');
            $table->bigInteger('stock');
            $table->bigInteger('sales')->nullable();
            $table->integer('rating')->default('5');
            $table->string('thumbnail');
            $table->integer('shipping');
            $table->string('product_no');
            $table->boolean('deleted')->default(false);
            $table->foreignId('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
        Schema::enableForeignKeyConstraints();
    }
}
