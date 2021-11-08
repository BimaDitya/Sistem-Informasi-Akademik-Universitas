<?php

namespace App\Models;

use App\Models\Account;
use App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'students';

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function college()
    {
        return $this->belongsToMany(College::class);
    }
}
