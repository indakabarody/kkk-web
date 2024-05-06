<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('nim', 'ASC')->get();
        return view('admin.pages.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' =>'required|unique:students,nim',
            'name' =>'required',
            'email' =>'required|email|unique:students,email',
        ]);

        Student::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.students.index')->with('toast_success', 'Berhasil menambahkan mahasiswa.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('admin.pages.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nim' =>'required|unique:students,nim,'. $student->id,
            'name' =>'required',
            'email' =>'required|email|unique:students,email,'. $student->id,
        ]);

        $student->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.students.index')->with('toast_success', 'Berhasil mengubah data mahasiswa.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return back()->with('toast_success', 'Berhasil menghapus data mahasiswa.');
    }
}
