<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration// digunakan dalam Laravel untuk membuat kelas migrasi                                                                 secara dinamis menggunakan anonymous class (kelas tanpa nama). 
{
    /**
     * Run the migrations.
     */
    public function up(): void // digunakan untuk mendefinisikan perubahan yang akan dilakukan                                                            pada struktur database saat migrasi dijalankan (dengan perintah php artisan migrate).
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();// dalam migrasi Laravel digunakan untuk mendefinisikan kolom id                                             sebagai kolom yang menjadi primary key dengan tipe data string.
            $table->foreignId('user_id')->nullable()->index();//digunakan dalam migrasi Laravel untuk menambahkan                                         kolom user_id dengan beberapa karakteristik 
            $table->string('ip_address', 45)->nullable();//digunakan untuk menambahkan kolom ip_address dengan beberapa karakteristik
            $table->text('user_agent')->nullable();//digunakan dalam migrasi Laravel untuk menambahkan kolom user_agent dengan beberapa karakteristik 
            $table->longText('payload');// digunakan untuk mendefinisikan kolom payload dengan tipe data LONGTEXT yang memiliki beberapa karakteristik 
            $table->integer('last_activity')->index();//digunakan dalam migrasi Laravel untuk mendefinisikan kolom last_activity                          dengan tipe data integer dan menambahkan index pada kolom tersebut. 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
