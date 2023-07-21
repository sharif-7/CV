<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('describe')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('hero_picture')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('job_title')->nullable();
            $table->date('birthday')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->integer('age')->nullable();
            $table->string('degree')->nullable();
            $table->string('email')->nullable();
            $table->boolean('freelance')->default(false);
            $table->text('description')->nullable();
            $table->json('skills')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
