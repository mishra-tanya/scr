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
        Schema::create('test_name', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->primary();
            $table->string('url_id', 1000);
            $table->text('title');
            $table->string('url', 1000);
            $table->string('chapter', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_name');
    }
};
