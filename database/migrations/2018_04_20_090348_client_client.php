<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_client', function(Blueprint $table)
        {
            $table->integer('phone_id')->unsigned();
            $table->foreign('phone_id')
                ->references('id')->on('clients')->onDelete('cascade');

            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')
                ->on('clients')->onDelete('cascade');

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
        Schema::dropIfExists('client_client');
    }
}
