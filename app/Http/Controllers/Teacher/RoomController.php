<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use DB;
use App\Room;

class RoomController extends Controller
{
    public function showForm(){
    	return view('teacher/add_room');
    }

    public function insertRoom(Request $request){
    	$validatedData = $request->validate([
	    	'course_name' => 'required|max:50',
	        'course_code' => 'required|max:8',
	        'course_session' => 'required|max:15',
	        'class_section' => 'required|max:6',
        ]);

		$data=array();
        $data['teacher_id']=$request->teacher_id;
        $data['course_name']=$request->course_name;
        $data['course_code']=$request->course_code;
        $data['course_session']=$request->course_session;
        $data['class_section']=$request->class_section;
        $classcode = str::random(6);
       	$data['class_code']=$classcode;

       	$success = DB::table('rooms')->insert($data);
              if ($success) {
                 $notification=array(
                 'message'=>'Class Successfully Added',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('create-class')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Class ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }       
    }

    public function showClassbyId(){
    	return view('teacher/all_class');
    }
}
