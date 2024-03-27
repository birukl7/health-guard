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
        Schema::create('alcohol_use_trackers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('question_1')->nullable();
            $table->boolean('question_2')->nullable();
            $table->boolean('question_3')->nullable();
            $table->boolean('question_4')->nullable();
            $table->boolean('question_5')->nullable();
            $table->boolean('question_6')->nullable();
            $table->boolean('question_7')->nullable();
            $table->boolean('question_8')->nullable();
            $table->boolean('question_9')->nullable();
            $table->boolean('question_10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alcohol_use_trackers');
    }
};
