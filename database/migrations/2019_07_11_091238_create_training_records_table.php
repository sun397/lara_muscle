<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('training_select_id');
            $table->integer('weight');
            $table->integer('rep');
            $table->integer('set');
            $table->integer('interval');
            $table->date('training_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_records');
    }
}
