<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\SchoolClass; // Tambahkan model SchoolClass

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('classes')->get(); // Ambil guru dengan kelas yang diajar
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $classes = SchoolClass::all(); // Ambil semua kelas untuk pilihan
        return view('teachers.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'nullable|string|max:15',
            'subject' => 'nullable|string|max:255',
            'class_ids' => 'required|array', // Validasi kelas sebagai array
            'class_ids.*' => 'exists:school_classes,id' // Pastikan ID kelas valid
        ]);

        // Simpan data guru
        $teacher = Teacher::create($request->only(['name', 'email', 'phone', 'subject']));

        // Simpan relasi many-to-many
        $teacher->classes()->sync($request->class_ids); 

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $classes = SchoolClass::all(); // Ambil semua kelas untuk pilihan
        $selectedClasses = $teacher->classes->pluck('id')->toArray(); // Ambil kelas yang sudah dipilih

        return view('teachers.edit', compact('teacher', 'classes', 'selectedClasses'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:15',
            'subject' => 'nullable|string|max:255',
            'class_ids' => 'required|array',
            'class_ids.*' => 'exists:school_classes,id'
        ]);

        // Update data guru
        $teacher->update($request->only(['name', 'email', 'phone', 'subject']));

        // Update relasi Many-to-Many (sync akan mengganti daftar kelas lama dengan yang baru)
        $teacher->classes()->sync($request->class_ids);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->classes()->detach(); // Hapus relasi dengan kelas sebelum menghapus guru
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
    }
}
