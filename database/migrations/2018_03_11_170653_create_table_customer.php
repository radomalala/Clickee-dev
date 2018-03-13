<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function(Blueprint $table){
            $table->increments('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('postal_code');
            $table->string('country');
            $table->string('phone_number');
            $table->string('email');
            $table->date('birthday');
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
        Schema::dropIfExists('customer');
    }
}
