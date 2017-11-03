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
        	$table->integer('user_fk')->unsigned();
        	$table->string('login', 45)->default('');
        	$table->string('password', 45)->nullable()->default(null);
        	$table->decimal('lastactive', 20, 0)->nullable()->default(null);
        	$table->integer('access_level')->nullable()->default(null);
        	$table->string('lastIP', 20)->nullable()->default(null);
        	$table->integer('lastServer')->nullable()->default('1');
        	
        	$table->primary('login');
        	
        	$table->index('user_fk','fk_accounts_1');
        	
        	$table->foreign('user_fk')
        	->references('id')->on('users');
        	
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
        Schema::dropIfExists('accounts');
    }
}
