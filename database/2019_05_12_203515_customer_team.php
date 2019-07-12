<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
 {
     Schema::create('customer_team', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->string('title');
         $table->string('role');
         $table->string('area');
         $table->string('region');
         $table->string('territory');
         $table->integer('phone');
         $table->string('email');
         $table->timestamps();
     });
 }

   
}
