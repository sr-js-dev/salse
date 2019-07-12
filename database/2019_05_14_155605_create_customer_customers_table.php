<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('segment');
            $table->string('name');
            $table->string('division');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('pocname');
            $table->integer('phone');
            $table->string('email');
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
        Schema::dropIfExists('customer_customers');
    }
}
