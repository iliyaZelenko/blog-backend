<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->json('answers'); // в формате [{text: ''}, {...}, ...]
            $table->json('correct_answers'); // правильные ответы/ответ(индексы), если один ответ - то радио, иначе чекбоксы
            $table->text('answer_info'); // объяснение ответа
            $table->integer('lvl'); // 0 - easy, 1 - normal, 2 - hard
            $table->unsignedInteger('category_id');
            $table->timestamps();

//            $table->foreign('category_id')
//                ->references('id')
//                ->on('categories')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
