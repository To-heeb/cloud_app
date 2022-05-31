<?php

namespace App\Http\Controllers;

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
            "Tim Cook"=>4.12,
            "Elon Musk"=>4.04,
            "Bill Gates"=>4.50,
            "Larry Page"=>3.74,
        );
        return view('students.liststudent', compact('institution', 'title', 'scores'));

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
        session(['matricno'=>'OAU123456']);
        //this session will be available anywhere in the script both the model, view or controller.

        //add new student 
        $institution = "Opebi University of Technology";
        $title = "Add New Student";
        $faculties = array(
            "1"=>"Art",
            "2"=>"Law",
            "3"=>"Sciences",
            "4"=>"Health Sciences",
            "5"=>"Social Sciences",

        );

        return view('students.addstudent', ['institution'=>$institution, 'title'=>$title, 'faculties'=>$faculties]);//what we are passing to the blade template of addstudent is an associative array

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
            'faculty'=>'required',
            "fullname"=>'required',
            'biography'=>'required',
            'emailaddress'=>'required|email',
            'dob'=>'required|date',
            'profilephoto'=>'required|image|max:205092'
        ]);

        //upload image to profile photos directory
        if ($request->hasFile('profilephoto')) {
            $file = request()->file('profilephoto');
            $file_ext = $file->extension();

            //$filename = $file->getClientOriginalName();
            $filename = rand().time().".".$file_ext;
            $destination = public_path().'/profilephotos';
            $file->move($destination, $filename);
            
        }

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
        $fullname = "Tim Cook";

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
