<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $hidden = 'password';
    
    public $timestamps = false;

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}