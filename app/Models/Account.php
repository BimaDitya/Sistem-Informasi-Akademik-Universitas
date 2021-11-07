<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Student;
use App\Models\School;
use App\Models\Parental;
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

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function school()
    {
        return $this->hasOne(School::class);
    }

    public function parent()
    {
        return $this->hasOne(Parental::class);
    }
}