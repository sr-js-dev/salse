<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CutomerCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_customers_store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('segment');
            $table->string('name');
            $table->string('division');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('pocname');
            $table->string('phone')->unique();
            $table->string('email')->unique();
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
        //
    }
}
