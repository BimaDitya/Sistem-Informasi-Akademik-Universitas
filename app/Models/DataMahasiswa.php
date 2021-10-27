<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataMahasiswa extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $protected = ['data_mahasiswas'];
    protected $fillable = [
        'TempatLahir',
        'TanggalLahir',
        'JalurPenerimaan',
    ];

}
