<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shop_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('balance')->default(0);
            $table->string('address')->nullable();
            $table->bigInteger('no_product')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('email_verify')->default(0);
            $table->string('email_verify_code')->nullable();
            $table->integer('tax_rate')->nullable();
            $table->integer('shipping_rate')->nullable();
            $table->string('cnicfront')->nullable();
            $table->string('cnicback')->nullable();
            $table->string('approve')->default(false);
            $table->string('code')->nullable();
            $table->boolean('deleted')->default(false);
            $table->foreignId('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('vendors');
    }
}
