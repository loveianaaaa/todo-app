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
    public function run(): void
    {
        $this->call(TaskListSeeder::class);
        $this->call(TaskSeeder::class);
    }
}