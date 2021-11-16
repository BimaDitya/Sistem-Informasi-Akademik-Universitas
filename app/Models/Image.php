<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
