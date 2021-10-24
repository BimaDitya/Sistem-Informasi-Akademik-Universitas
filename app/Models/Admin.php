<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $table = 'students';

    public function setPasswordAtrributes($password) 
    {
        $this->attributes['password'] = bcrypt($password);
    }

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'agama',
        'alamat', 
        'nim',
        'password'
    ];
    
    protected $hidden = 'password';
}
