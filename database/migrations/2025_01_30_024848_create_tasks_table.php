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
            $table->string('name');//digunakan untuk mendefinisikan kolom dalam tabel yang bertipe string. 
            $table->string('description')->nullable();//digunakan untuk membuat kolom description dengan                                                     tipe string yang dapat menyimpan nilai teks dan boleh kosong (NULL
            $table->boolean('is_completed')->default(false);//digunakan dalam migrasi di Laravel untuk mendefinisikan                                     kolom bertipe boolean yang akan menyimpan nilai true atau false, dengan nilai default false. Biasanya,
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');// di Laravel digunakan untuk                                          mendefinisikan kolom priority yang bertipe ENUM
            $table->timestamps();//digunakan untuk menambahkan dua kolom created_at dan updated_at ke tabel

            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');                                                                                                                                      //digunakan untuk menambahkan kolom list_id yang merupakan foreign key yang menghubungkan                                                     tabel yang sedang dibuat dengan tabel lain, dalam hal ini dengan tabel task_lists.
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