<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scheme_id');
            $table->integer('week');
            $table->integer('period');
            $table->string('title')->nullable();
            $table->mediumText('objectives')->nullable();
            $table->mediumText('key_points')->nullable();
            $table->mediumText('activities')->nullable();
            $table->mediumText('refernces')->nullable();
            $table->string('remarks')->nullable();
            $table->date('date_taught')->nullable();
            $table->mediumText('teaching_aids')->nullable();
            $table->timestamps();
            $table->foreign('scheme_id')->references('id')->on('schemes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
