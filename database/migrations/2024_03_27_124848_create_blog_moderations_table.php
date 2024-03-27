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
        Schema::create('blog_moderations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_profile_id')->constrained()->onDelete('cascade');
            $table->boolean('approved')->default(false);
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_moderations');
    }
};
