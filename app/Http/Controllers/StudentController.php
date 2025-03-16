<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (request()->has('po')) {
            // Menggunakan metode search dari package nicolaslopezj/searchable
            $student = \App\Models\student::search(request('po'))
                ->orderBy('name', 'ASC')
                ->orderBy('grade', 'ASC')
                ->paginate(20);
        } else {
            $student = \App\Models\student::latest()
                ->orderBy('grade', 'ASC')
                ->paginate(10);
        }
    
        $data['student'] = $student;
        return view('student_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('student_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name'  => 'required|string|max:100',
            'gender'=> 'required|in:Laki-Laki,Perempuan',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'grade' => 'required|in:XU.1,XU.2,XU.3,XU.4,XU.5,XU.6,XU.7,XU.8,XU.9,XU.10,XU.11',
        ]);

        Student::create($requestData);
        return redirect('/student')
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $data['student'] = $student;
        return view('student_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $requestData = $request->validate([
            'name'  => 'required|string|max:100',
            'gender'=> 'required|in:Laki-Laki,Perempuan',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'phone' => 'required|string|max:20',
            'grade' => 'required|in:XU.1,XU.2,XU.3,XU.4,XU.5,XU.6,XU.7,XU.8,XU.9,XU.10,XU.11',
        ]);
    
        $student->update($requestData);
        
        return redirect('/student')
            ->with('success', 'Data siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/student')
            ->with('success', 'Data siswa berhasil dihapus!');
    }
}