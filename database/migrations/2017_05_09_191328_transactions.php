<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status_id');
            $table->integer('project_id');
            // $table->string('file_name', 50);
            $table->string('authorization_code', 100);
            $table->string('price', 6);
            $table->string('buyer_email', 100);
            $table->string('buyer_phone_num', 15);
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('visible');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
