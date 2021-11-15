<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Grades extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'grades';

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
