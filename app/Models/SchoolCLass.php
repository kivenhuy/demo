<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCLass extends Model
{
    use HasFactory;
    protected $table = 'school_classes';
    protected $fillable = [
        'class_name',
        'status',
    ];

    public function student()
    {
        return $this->hasMany(Students::class);
    }
}
