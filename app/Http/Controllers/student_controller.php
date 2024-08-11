<?php

namespace App\Http\Controllers;

use App\Models\Students;


use Illuminate\Http\Request;
// use Illuminate\Support\Facades\View;

class student_controller extends Controller
{


    public function index()
    {
        $students = Students::all();
        return view('students.studentsData', compact('students'));
    }

    public function showOne($id)
    {
        $student = Students::find($id);
        return view('students.studentData', compact('student'));
    }

    public function destroy($id)
    {
        $student = Students::find($id);
        $student->delete();

        return redirect()->route('students.index')->with('status', 'Student deleted successfully');
    }
    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {


        $student = new Students;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->grade = $request->input('grade');
        $student->gender = $request->input('gender');
        $student->address = $request->input('address');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imagename = time() . '.' . $image->extension();

            $image->move(public_path('resources/images'), $imagename);

            $student->image = '/resources/images/' . $imagename;
        } else {
            $student->image = '/resources/images/default.png';
        }

        $student->save();
        @dd($request->all(), $request->file('image'));

        return redirect(route('students.index'));
    }
    public function edit($id)
    {
        $student = Students::findOrFail($id);
        return view('students.update', compact('student'));
    }

    // public function update(Request $request, $id)
    // {
    //     $student = Students::findOrFail($id);
    //     $updatedStudentData = $request->all();
    //     $student->update($updatedStudentData);

    //     return redirect(route('students.index'));
    // }

    public function update(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        // Update student details except for the image
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->grade = $request->input('grade');
        $student->gender = $request->input('gender');
        $student->address = $request->input('address');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->extension();
            $image->move(public_path('resources/images'), $imagename);
            $student->image = '/resources/images/' . $imagename;
        }

        $student->save();

        return redirect(route('students.index'))->with('status', 'Student updated successfully');
    }
}
