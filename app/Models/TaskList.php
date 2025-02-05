<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = ['name']; //protected itu untuk mengontrol name udah ada atu belum
    protected $guarded = [ //protected itu untuk mengontrol id
        'id',
        'created_at', 
        'updated_at' //untuk memperbarui 
    ];

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
    }
} 