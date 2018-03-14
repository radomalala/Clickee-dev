<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEcasement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encasement', function (Blueprint $table) {
            $table->increments('encasement_id');
            $table->integer('customer_id')->index('idx_customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')
                ->references('customer_id')->on('customer');
            $table->integer('product_id')->index('idx_product_id')->unsigned()->nullable();
            $table->foreign('product_id')
                ->references('product_id')->on('product')
                ->onDelete('cascade');
            $table->integer('attribute_size_id')->unsigned()->nullable();
            $table->integer('attribute_color_id')->unsigned()->nullable();
            $table->integer('parent_category')->index('idx_parent_category')->unsigned()->nullable();
            $table->foreign('parent_category')
                ->references('category_id')->on('category');
            $table->integer('sub_category')->index('idx_sub_category')->unsigned()->nullable();
            $table->foreign('sub_category')
                ->references('category_id')->on('category');
            $table->integer('promo_code_id')->unsigned()->nullable();
            $table->integer('discount');
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
        Schema::dropIfExists('encasement');
    }
}
