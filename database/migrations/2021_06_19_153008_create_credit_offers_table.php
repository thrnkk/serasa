<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partner_id');
            $table->unsignedInteger('credit_type_id');
            $table->float('value', 8, 2);
            $table->integer('installments');
            $table->float('installments_value', 8, 2);
            $table->integer('tax_rate_percent');   
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('credit_type_id')->references('id')->on('credit_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_offers');
    }
}
