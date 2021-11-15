<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $table = 'payments';

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
