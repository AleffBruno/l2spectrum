<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameservers', function (Blueprint $table) {
        	
        	$table->integer('server_id')->default('0');
        	$table->string('hexid', 50)->default('');
        	$table->string('host', 50)->default('');
        	
        	$table->primary('server_id');
        	
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
        Schema::dropIfExists('gameservers');
    }
}
