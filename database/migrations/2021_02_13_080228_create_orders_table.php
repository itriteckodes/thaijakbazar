<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreignId('gateway_id');
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->text('address');    
            $table->text('note')->nullable();
            $table->integer('subtotal');
            $table->integer('shipping');
            $table->integer('tax');
            $table->integer('discount');
            $table->bigInteger('grand_total');
            $table->string('status')->default(0);
            $table->tinyInteger('paid')->default(false);
            $table->text('comment')->nullable();    
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
        Schema::dropIfExists('orders');
    }
}
