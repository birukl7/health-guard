<?php

use App\Models\User;
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
        Schema::create('depression_trackers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('question_1')->nullable();
            $table->string('question_2')->nullable();
            $table->string('question_3')->nullable();
            $table->string('question_4')->nullable();
            $table->string('question_5')->nullable();
            $table->string('question_6')->nullable();
            $table->string('question_7')->nullable();
            $table->string('question_8')->nullable();
            $table->string('question_9')->nullable();
            $table->string('question_10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depression_trackers');
    }
};
