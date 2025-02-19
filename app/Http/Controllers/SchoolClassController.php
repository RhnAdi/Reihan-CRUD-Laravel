<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Teacher;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('classes.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:10',
        ]);

        SchoolClass::create($request->only(['name', 'grade']));

        return redirect()->route('classes.index')->with('success', 'Class added successfully');
    }

    public function show(Request $request, SchoolClass $schoolClass)
    {
        $schoolClass = SchoolClass::find($request->route('class'));
        $students = $schoolClass->students ?? collect(); 
        $teachers = $schoolClass->teachers ?? collect(); 

        return view('classes.show', compact('schoolClass', 'students', 'teachers'));
    }

    public function edit(Request $request)
    {
        $schoolClass = SchoolClass::find($request->route('class'));
        $teachers = Teacher::all();
        return view('classes.edit', compact('schoolClass', 'teachers'));
    }

    public function update(Request $request, SchoolClass $schoolClass)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:10',
        ]);

        $schoolClass = SchoolClass::find($request->route('class'));
        // Memperbarui data kelas
        $schoolClass->update($request->only(['name', 'grade']));

        return redirect()->route('classes.index')->with('success', 'Class updated successfully');
    }

    public function destroy(SchoolClass $schoolClass)
    {
        $schoolClass->delete(); // Menghapus data kelas
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully');
    }
}
