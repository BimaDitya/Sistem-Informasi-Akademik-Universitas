<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Student;
use App\Models\School;
use App\Models\Parental;
use App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $guarded = ['id'];

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

    public function college()
    {
        return $this->belongsToMany(College::class);
    }
}