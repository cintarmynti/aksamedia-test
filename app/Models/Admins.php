<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admins extends Model
{
    use  HasApiTokens, Notifiable, HasFactory;
    protected $table = 'admins';
    protected $fillable = ['name', 'username', 'password', 'phone', 'email'];
}
