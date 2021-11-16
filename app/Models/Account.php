<?php

namespace App\Models;

use App\Models\Grades;
use App\Models\School;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Address;
use App\Models\Parental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $guarded = ['id'];

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
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function parent()
    {
        return $this->hasOne(Parental::class);
    }

    public function grades()
    {
        return $this->hasMany(Grades::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}