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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->decimal('basicPercent');
            $table->string('basicDeg');
            $table->string('basicDegValue');

            $table->decimal('relaxPercent');
            $table->string('relaxDeg');
            $table->string('relaxDegValue');

            $table->decimal('reliefPercent');
            $table->string('reliefDeg');
            $table->string('reliefDegPercent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
