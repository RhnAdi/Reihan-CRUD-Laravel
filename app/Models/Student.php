<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'class_id' // Menambahkan kolom class_id untuk relasi dengan kelas
    ];

    public function class()
    {
        return $this->belongsTo(SchoolClass::class);
    }
}
