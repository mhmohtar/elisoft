<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
            'id', 
            'name', 
            'email', 
            'email_verified_at', 
            'remember_token',
            'created_at',
            'updated_at',
    ];
}
