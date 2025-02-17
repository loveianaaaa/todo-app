<?php
//seeder adalah data sementara atau data awal
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void //Metode run() dalam konteks migrasi dan seeding di Laravel digunakan                                                       untuk menjalankan logika tertentu saat migrasi atau seeding dilakukan
    {
        $this->call(TaskListSeeder::class);// digunakan dalam seeder utama di Laravel untuk memanggil dan                                               menjalankan TaskListSeeder, yang akan mengisi tabel task_lists dengan data yang telah didefinisikan dalam TaskListSeeder.
        $this->call(TaskSeeder::class);//digunakan untuk memanggil TaskSeeder di dalam seeder utama di Laravel.
    }
}