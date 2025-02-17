<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [// properti $fillable digunakan untuk mendefinisikan atribut                                                                    mana yang dapat diisi secara massal (mass-assigned) pada model.
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [//properti $hidden digunakan untuk menentukan atribut model                                                                       yang tidak ingin ditampilkan ketika model diubah menjadi array atau JSON.
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array //, casts umumnya digunakan sebagai properti yang didefinisikan                                                        di dalam model untuk mengonversi atribut menjadi tipe data yang diinginkan
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
