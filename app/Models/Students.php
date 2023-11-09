<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'student_name',
        'student_age',
        'student_gender',
        'student_phone'
    ];

    public function class()
    {
        return $this->belongsTo(SchoolCLass::class);
    }
}
