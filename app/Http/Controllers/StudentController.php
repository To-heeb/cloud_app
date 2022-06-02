<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //list of student
        $institution = "Opebi University of Technology";
        $title = "List of PHP Class Students";
        $scores = array(
            "Tim Cook" => 4.12,
            "Elon Musk" => 4.04,
            "Bill Gates" => 4.50,
            "Larry Page" => 3.74,
        );

        $students = Student::all();

        return view('students.liststudent', compact('institution', 'title', 'scores', 'students'));

        //return view('myadmin.contacts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create session varaibles
        //Via the global session helper
        session(['matricno' => 'OAU123456']);
        //this session will be available anywhere in the script both the model, view or controller.

        //add new student 
        $institution = "Opebi University of Technology";
        $title = "Add New Student";
        $faculties = array(
            "1" => "Art",
            "2" => "Law",
            "3" => "Sciences",
            "4" => "Health Sciences",
            "5" => "Social Sciences",
            "6" => "Engineering"
        );

        return view('students.addstudent', ['institution' => $institution, 'title' => $title, 'faculties' => $faculties]); //what we are passing to the blade template of addstudent is an associative array

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd means dump and die
        //dd($request);

        $validated = $request->validate([
            //the names value should be ths same name as that on the form field
            'faculty' => 'required',
            "fullname" => 'required',
            'biography' => 'required',
            'emailaddress' => 'required|email|unique:students',
            'dob' => 'required|date',
            'profile_photo' => 'required|image|max:205092'
        ]);

        //upload image to profile photos directory
        if ($request->hasFile('profile_photo')) {
            $file = request()->file('profile_photo');
            $file_ext = $file->extension();

            //$filename = $file->getClientOriginalName();
            $filename = rand() . time() . "." . $file_ext;
            $destination = public_path() . '/profilephotos';
            $file->move($destination, $filename);
            $validated['profile_photo'] = $filename;
        }

        //dd($validated);

        Student::create($validated);

        //set flash session
        $request->session()->flash("success", "A new student was successfully added");

        return redirect('students');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fullname = "Tim Cook is here again as the big Don";

        return view('students.showstudent')->with('name', $fullname);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student_details = Student::getStudent($id);
        $institution = "Opebi University of Technology";
        $title = "Edit Student";
        $faculties = array(
            "1" => "Art",
            "2" => "Law",
            "3" => "Sciences",
            "4" => "Health Sciences",
            "5" => "Social Sciences",
            "6" => "Engineering"
        );

        // dd($student_details);
        return view('students.editstudent', compact('student_details', 'institution', 'faculties', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $formFields = $request->validate([
            //the names value should be ths same name as that on the form field
            'faculty' => 'required',
            "fullname" => 'required',
            'biography' => 'required',
            'emailaddress' => 'required|email',
            'dob' => 'required|date',
            'profile_photo' => 'image|max:205092'
        ]);


        if ($request->hasFile('profile_photo')) {
            $file = request()->file('profile_photo');
            $file_ext = $file->extension();

            //$filename = $file->getClientOriginalName();
            $filename = rand() . time() . "." . $file_ext;
            $destination = public_path() . '/profilephotos';
            $file->move($destination, $filename);
            $formFields['profile_photo'] = $filename;
        }

        $student->update($formFields);

        $request->session()->flash('success', 'Student details successfully updated!');

        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect('students')->with('success', 'Student details deleted successfully!');
    }
}
