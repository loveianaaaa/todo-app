<?php
//seeder adalah data sementara atau data awal 
namespace Database\Seeders; 

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 // adalah deklarasi yang digunakan dalam seeder di Laravel, untuk mematikan atau menghindari pemicu model                                       events (seperti creating, updating, saving, dll.) ketika data disisipkan melalui seeder.
use Illuminate\Database\Seeder;
//adalah deklarasi import dalam file seeder di Laravel, yang memungkinkan Anda untuk menggunakan kelas Seeder                                      dari Laravel untuk melakukan pengisian data (seeding) ke dalam database.
use App\Models\TaskList;
// adalah deklarasi import di PHP yang digunakan untuk mengimpor model TaskList dari direktori                                                     app/Models ke dalam file yang sedang Anda kerjakan. 
class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lists = [ //lists adalah kategori atau judul
            [
                'name' => 'Liburan',
            ],
            [
                'name' => 'Belajar',
            ],
            [
                'name' => 'Tugas',
            ]
        ];

        TaskList::insert($lists); //(insert($lists)): Ini adalah metode yang digunakan untuk memasukkan                                          banyak data sekaligus ke dalam tabel.
    }
}
 