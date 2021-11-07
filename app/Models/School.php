<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $table = 'schools';

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
