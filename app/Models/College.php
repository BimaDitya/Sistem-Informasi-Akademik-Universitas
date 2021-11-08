<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'colleges';

    public $timestamps = false;

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}