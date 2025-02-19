<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass; // Pastikan menggunakan model SchoolClass jika diperlukan

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); // Menampilkan semua siswa
        return view('students.index', compact('students')); // Menampilkan ke view dengan data siswa
    }

    public function create()
    {
        $classes = SchoolClass::all(); // Mendapatkan semua kelas untuk ditampilkan dalam form
        return view('students.create', compact('classes')); // Menyertakan data kelas untuk form
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'class_id' => 'required|exists:school_classes,id', // Validasi class_id
        ]);

        // Menyimpan data siswa
        Student::create($request->only(['name', 'email', 'phone', 'address', 'class_id']));

        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classes = SchoolClass::all(); // Mendapatkan kelas untuk form edit
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id, // Menjaga email tetap unik
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'class_id' => 'required|exists:school_classes,id', // Validasi class_id
        ]);

        // Memperbarui data siswa
        $student->update($request->only(['name', 'email', 'phone', 'address', 'class_id']));

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete(); // Menghapus siswa
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
