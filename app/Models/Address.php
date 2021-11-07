<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'addresses';

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
