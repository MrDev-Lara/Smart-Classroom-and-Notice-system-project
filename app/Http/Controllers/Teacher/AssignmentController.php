<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Room;
use App\Assignment;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Events\TeacherPostAssignment;
use App\User;
use Illuminate\Support\Facades\Mail;

class AssignmentController extends Controller
{
    public function index($id){
    	$room_id = DB::table('rooms')->where('id',$id)->first();
    	return view('teacher/post_assignment',compact('room_id'));
    }

    public function postAssignment(Request $request){
    	$validatedData = $request->validate([
	    	'assignment_title' => 'required',
	        'assignment_description' => 'required|max:250',
	        'assignment_file' => 'required',
	        'assignment_file.*' => 'mimes:doc,pdf,docx,jpg,jpeg,png',
	        'assignment_due_date' => 'required',
	        'assignment_due_time' => 'required',
        ]);

		$data=array();
        $data['room_id']=$request->room_id;
        $data['assignment_title']=$request->assignment_title;
        $data['assignment_description']=$request->assignment_description;
        $data['assignment_post_date']=$request->assignment_post_date;
        $data['assignment_post_time']=$request->assignment_post_time;
        $data['assignment_due_date']=$request->assignment_due_date;
        $data['assignment_due_time']=$request->assignment_due_time;

        $file=$request->file('assignment_file');

        if ($file) {
            $file_name = str::random(5);
            $ext=strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='assignmentquestion/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);
            if ($success) {
                $data['assignment_file']=$file_url;
                $assignment_id = DB::table('assignments')
                         ->insertGetId($data);

                $assignment = Assignment::find($assignment_id);

                $room = Room::with('users')->find($assignment->room_id);
                event(new TeacherPostAssignment($assignment,$room));
                
                if($assignment_id){
                  $notification=array(
                         'message'=>'Your Assignment Have been Posted Successfully',
                         'alert-type'=>'success'
                          );
                      return Redirect()->back()->with($notification); 
                 }else{
                  $notification=array(
                         'message'=>'Sorry,Could not be able to post the Assignment this time.Try Again Later.',
                         'alert-type'=>'error'
                          );
                      return Redirect()->back()->with($notification); 
                 }
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }

    public function allAssignments($id){
    	$allassignments = Room::with('assignments')->where('id',$id)->first();
    	return view('teacher/all_assignments',compact('allassignments'));
    }

    public function allAssignmentsubmission($id){
      $allassignmentanswers = Assignment::with('assignmentanswers')->where('id',$id)->first();
      return view('teacher/all_assignment_submission',compact('allassignmentanswers'));
    }
}
