<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
