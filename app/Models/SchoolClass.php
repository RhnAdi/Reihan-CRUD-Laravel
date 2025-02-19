<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade',
    ];

    public function students() {
        return $this->hasMany(Student::class);
    }   

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'class_teacher', 'class_id', 'teacher_id');
    }
}
