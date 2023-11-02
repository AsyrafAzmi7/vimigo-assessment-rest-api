<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); 
        return response()->json($students);
    }
    
    public function uni(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->study_course = $request->input('study_course');
        $student->save();
        return response()->json([
            "message" => "Student Added."
        ], 201); 
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (!empty($student)) {
            return response()->json($student);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->address = $request->input('address');
            $student->study_course = $request->input('study_course');
            $student->save();
            return response()->json([
                "message" => "Student Updated."
            ], 200); 
        } else {
            return response()->json([
                "message" => "Student Not Found."
            ], 404); 
        }
    }

    public function destroy($id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();
    
            return response()->json([
                "message" => "Record deleted"
            ], 202); 
        } else {
            return response()->json([
                "message" => 'Student not found.'
            ], 404); 
        }
    }
}