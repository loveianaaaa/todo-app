<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{ //Kode ini mendefinisikan model bernama Task di Laravel. Model ini mewakili tabel di database,                                                             dan akan digunakan untuk berinteraksi dengan data terkait task (tugas).
    protected $fillable = ['name']; //protected itu untuk mengontrol name udah ada atu belum
    protected $guarded = [ //protected itu untuk mengontrol id
        'id',//yang harus diisi
        'created_at', //untuk membuat
        'updated_at' //untuk memperbarui 
    ];

    public function tasks() {//Baris kode ini biasanya digunakan untuk mendefinisikan                                                                    sebuah method dalam Laravel Eloquent Model atau Controller yang mengambil atau mengelola data task
    return $this->hasMany(Task::class, 'list_id');//Baris kode ini mendefinisikan relasi one-to-many                                                      antara model TaskList (misalnya) dan model Task.
    }
} 