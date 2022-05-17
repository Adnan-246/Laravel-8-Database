<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $class=DB::table('classes')->get();
  //  dd($class);
    return view('admin.class.index', compact('class'));
  }

  //_Create form page_//

  public function create()
  {
    return view('admin.class.create');
  }

  //_store class_//
  public function store(Request $request)
  {
    $request->validate([
      'class_name' =>'required|unique:classes',
    ]);

    $data  = array(
      'class_name' => $request->class_name,
    );
    DB::table('classes')->insert($data);
    return redirect()->back()->with('success', 'Added Successfully');
  }

  //_ Delete Method_
  public function delete($id)
  {
    DB::table('classes')->where('id', $id)->delete();
    return redirect()->back()->with('success', 'Successfully deleted');

  }

  //_Edit Method_//

  public function edit($id)
  {
    $data =DB::table('classes')->where('id',$id)->first();
    return view('admin.class.edit', compact('data'));
  }

  //_Update Method_//
  public function update(Request $request, $id)
  {
    $request->validate([
      'class_name' =>'required|unique:classes',
    ]);

    $data  = array(
      'class_name' => $request->class_name,
    );

    DB::table('classes')->where('id', $id)->update($data);
    return redirect()->back()->with('success', 'Successfully updated');
  }
}
