<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_rounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('quantity_questions');
            $table->integer('quantity_easys');
            $table->integer('quantity_normals');
            $table->integer('quantity_hards');
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
        Schema::dropIfExists('contest_rounds');
    }
}
