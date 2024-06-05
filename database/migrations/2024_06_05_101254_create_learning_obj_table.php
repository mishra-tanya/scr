<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lo_question_paper', function (Blueprint $table) {
            $table->integer('id')->unsigned()->default(0);
            $table->string('question_no', 100);
            $table->string('image', 100);
            $table->text('question_title');
            $table->text('option_a');
            $table->text('option_b');
            $table->text('option_c');
            $table->text('option_d');
            $table->string('result_ans', 10);
            $table->string('status', 100);
            $table->string('chapter_id', 100);
            $table->string('subject_id', 100);
            $table->text('reason');
            $table->string('test', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lo_question_paper');
    }
};
