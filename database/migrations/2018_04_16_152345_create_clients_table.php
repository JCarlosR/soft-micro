<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('IMEI', 16);
            $table->string('phoneNumber', 13);
            $table->dateTime('lastRequest')->nullable();
            $table->string('type', 5);
            $table->boolean('status')->default(false);

            $table->string('username', 25);
            $table->string('password');
            $table->string('admin_password');

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
        Schema::dropIfExists('clients');
    }
}
