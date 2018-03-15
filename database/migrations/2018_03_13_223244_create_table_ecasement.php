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
            $table->integer('total_ht');
            $table->integer('total_ttc');
            $table->integer('discount');
            $table->integer('tva');
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
