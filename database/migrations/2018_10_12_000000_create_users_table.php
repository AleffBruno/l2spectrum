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
    		$table->string('email')->unique();
    		$table->string('password', 45);
    		$table->string('name', 45)->nullable()->default(null);
    		$table->integer('credits')->default('0');
    		$table->string('lang_fk', 5)->default('en-GB');
    		
    		$table->index(['lang_fk']);
    		
    		$table->foreign('lang_fk')->references('uuid')->on('languages');
    		
    		//isso esta ativo pois é um atributo DEFAULT do laravel, se tirar, da erro quando fazer o logout
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
