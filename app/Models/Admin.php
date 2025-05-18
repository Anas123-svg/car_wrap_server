<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // To support authentication
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_photo',
        'role',
        'permissions',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
