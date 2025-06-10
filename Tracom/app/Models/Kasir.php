<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Kasir extends Authenticatable
{
     protected $table = 'kasirs';
    protected $primaryKey = 'id';

    public $incrementing = true; 
    protected $fillable = ['name', 'password'];
    protected $hidden = ['password'];

    // Override kolom yang dipakai untuk login
    public function getAuthIdentifierName()
    {
        return 'name';
    }
}
