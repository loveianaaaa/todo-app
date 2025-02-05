<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    protected $fillable = [ //untuk mengontrol name
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    protected $guarded = [ //untuk mengontrol id
        'id',
        'created_at',
        'updated_at'
    ];

    const PRIORITIES = [ //sebuah nilai yang tidak bisa dirubah
        'low',
        'medium',
        'high'
    ];

    public function getPriorityClassAttribute() { //untuk memdapatkan sebuah prioritas yg nantinya setiap prioritas akan                      diberikan warna sesuai kondisi
        return match($this->attributes['priority']) {
            'low' => 'success',// warna hijau
            'medium' => 'warning',// warna kuning
            'high' => 'danger',//warna merah
            default => 'secondary' //default itu (bawaan)secondary itu jika kita tidak memilih yang diatas maka akan muncul warna abu
        };
    }

    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}