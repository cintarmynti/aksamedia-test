<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable =  ['image', 'name', 'phone', 'division', 'position'];

    public function divisi(){
        return $this->belongsTo(Divisi::class, 'division', 'id');
    }
}
