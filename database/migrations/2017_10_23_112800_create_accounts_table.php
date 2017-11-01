<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            //$table->timestamps();
            $table->string('login')->default(" ");
            $table->string('password')->nullable();
            $table->decimal('lastactive',20,0)->nullable();
            $table->integer('access_level')->nullable();
            $table->string('lastIP')->nullable();
            $table->integer('lastServer')->default(1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
