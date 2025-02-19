<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolClass;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total class, student, dan teacher
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalClasses = SchoolClass::count();

        // Kirim data ke view
        return view('dashboard.index', compact('totalStudents', 'totalTeachers', 'totalClasses'));
    }
}
