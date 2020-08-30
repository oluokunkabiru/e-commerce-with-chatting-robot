<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_id');
            $table->string('product_id');
            $table->enum('status',['Pending','Delivered', 'Processing'])->default('Pending');
            $table->string('delivered_by')->nullable();
            $table->string('picture_id');
            $table->string('quantity');
            $table->string('product_name');
            $table->string('billing_email');
            $table->string('billing_country');
            $table->string('billing_state');
            $table->string('billing_city');
            $table->string('billing_address');
            $table->string('billing_zipcode');
            $table->string('billing_phone');
            $table->string('billing_price');
            $table->string('billing_total_price');
            $table->string('billing_payment_method');
            $table->string('orderid');
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
