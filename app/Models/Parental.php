<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Parental extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
