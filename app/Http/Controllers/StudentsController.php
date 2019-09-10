<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $students= Student::all();
       // return view('students.index',['students=>$students']);
       return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $student = new Student;
        // $student->nama = $request->nama;
        // $student->nrp = $request->nrp;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;
        
        // $student->save();

        // Student::create([
        //     'nama'=>$request->nama,
        //     'nrp'=>$request->nrp,
        //     'email'=>$request->email,
        //     'jurusan'=>$request->jurusan

        // ]);

        $request->validate([
            'nama'=>'required',
            'nrp'=>'required|size:9',
            'email'=>'required',
            'jurusan'=>'required'
        ]);
        Student::create($request->all());

        return redirect('/students')->with('status','Data Mahasiswa berhasil Ditambahkan'); 


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
       // return $student; liat array student
         return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
         return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
       
        $request->validate([
            'nama'=>'required',
            'nrp'=>'required|size:9',
            'email'=>'required',
            'jurusan'=>'required'
        ]);
       Student::where('id',$student->id)->update([
            'nama'=>$request->nama,
            'nrp'=>$request->nrp,
            'email'=>$request->email,
            'jurusan'=>$request->jurusan
       ]);

        return redirect('/students')->with('status','Data Mahasiswa berhasil DiUbah!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status','Data Mahasiswa berhasil Dihapus!'); 
    }
}
