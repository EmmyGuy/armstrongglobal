<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApplicationsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('group_id');
            $table->tinyInteger('paricipant_id');
            $table->tinyInteger('user_id');
            $table->string('state', 20);
            $table->string('lga', 25);
            $table->string('category', 50);
            $table->string('private_sch_category', 50);
            $table->string('name_of_sch', 200);
            $table->string('est_year', 20);
            $table->string('staff_srength', 5);
            $table->string('num_of_std', 6);
            $table->string('phone', 13);
            $table->string('email', 100);
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
        Schema::dropIfExists('applications');
    }
}
