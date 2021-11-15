<?php

namespace App\Models;

use App\Models\Grades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'courses';

    public $timestamps = false;

    public function grades()
    {
        return $this->hasMany(Grades::class);
    }
}
