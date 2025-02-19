<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject'
    ];

    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'class_teacher', 'teacher_id', 'class_id');
    }
}
