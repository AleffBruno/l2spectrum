<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
    	Schema::create('users', function(Blueprint $table) {
    		$table->increments('id');
    		$table->string('email');
    		$table->string('password', 45);
    		$table->string('name', 45)->nullable()->default(null);
    		$table->integer('credits')->default('0');
    		$table->string('lang_fk', 5)->default('en-GB');
    		
    		$table->index(['lang_fk']);
    		
    		$table->foreign('lang_fk')->references('uuid')->on('languages');
    		
    		$table->rememberToken();
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
