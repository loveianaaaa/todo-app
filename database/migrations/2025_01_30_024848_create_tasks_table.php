<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration//Merupakan cara penulisan migrasi dengan menggunakan kelas anonim                                                (anonymous class) di Laravel, yang diperkenalkan di PHP 7.0. 
{
    /**
     * Run the migrations.
     */
    public function up(): void //digunakan untuk menentukan perubahan yang akan diterapkan pada                                                         struktur database ketika migrasi dijalankan.
    {
        Schema::create('tasks', function (Blueprint $table) { // digunakan untuk membuat tabel baru dalam database.                                          Ini adalah bagian dari migrasi di Laravel yang memungkinkan kamu untuk mendefinisikan struktur tabel                                             database dengan menggunakan schema builder.
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->timestamps();

            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};