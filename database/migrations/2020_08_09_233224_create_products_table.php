<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('picture_id');
            $table->string('slug');
            $table->string('product_name');
            $table->string('newprice');
            $table->string('oldprice');
            $table->string('quantity');
            $table->string('category_id');
            $table->string('user_id');
            $table->string('location');
            $table->string('city')->default('city not available');
            $table->string('region')->default('region not available');;
            $table->string('country')->default('country not available');;
            $table->string('updated_user')->nullable();
            $table->ipAddress('user_ipaddress');
            $table->string('user_location')->default('not available');
            $table->string('user_browser');
            $table->text('description')->nullable();
            $table->softDeletes();
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
