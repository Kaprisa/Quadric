<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            //$table->integer('side');
            $table->string('video')->nullable();
            $table->text('text1')->nullable();
            $table->text('text2')->nullable();
            $table->text('resourses')->nullable(); // Доп. ресурсы
            $table->integer('block_id')->references('id')->on('blocks')->onDelete('cascade');;
            $table->integer('sort');
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('lessons');
    }
}
