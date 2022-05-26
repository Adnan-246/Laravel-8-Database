<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //_Using Model to show Students Lists_//
        // $students=Student::all();
        // return response()->json($students);

        //$students =DB::table('students')->orderBy('roll','ASC')->get();
        //_Join_//
   $students= DB::table('students')->join('classes','students.class_id','classes.id')->simplePaginate(5);
       //dd($students);

       // $data=DB::table('students')
       // ->crossJoin('classes')
       // ->get();
       // dd($data);

   return view('admin.student.index', compact('students'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes =DB::table('classes')->get();
        return view('admin.student.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
        'class_id' =>'required',
        'name' =>'required',
        'email' =>'required|max:50|unique:students',
        'phone' =>'required',
        'roll' =>'required',
      ]);

      $data  = array(
        'class_id' => $request->class_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'roll' => $request->roll,
      );
      DB::table('students')->insert($data);
      return redirect()->back()->with('success', 'Successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$student = DB::table('students')->where('id', $id)->first();
        //return response()->json($student);
        $student =DB::table('students')->find($id);
        return view('admin.student.view', compact ('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes =DB::table('classes')->get();
        $student = DB::table('students')->where('id',$id)->first();
        return view('admin.student.edit', compact('classes', 'student'));
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
        $request->validate([
        'class_id' =>'required',
        'name' =>'required',
        //'email' =>'required|max:50|unique:students',
        'phone' =>'required',
        'roll' =>'required',
      ]);

      $data  = array(
        'class_id' => $request->class_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'roll' => $request->roll,
      );
      DB::table('students')->where('id',$id)->update($data);
      return redirect()->route('students.index')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //resource route use korar jonno form submit ar maddhome delete kortre fa-heartbeat
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Successfully deleted');

    }
}
