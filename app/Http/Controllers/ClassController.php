<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Room;
use App\Roompost;
use App\Roompostfile;
use App\Roompostcomment;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class ClassController extends Controller
{
    public function index(){
    	return view('join_class');
    }

    public function joinRoom(Request $request){
    	$user_id = $request->user_id;
    	$course_code = $request->course_code;
    	$class_code = $request->class_code;

    	$valid = DB::table('rooms')->where('course_code',$course_code)->where('class_code',$class_code)->first();
    	if($valid){
    		$studentclass = DB::table('room_user')->where('user_id',$user_id)->where('room_id',$valid->id)->first();
    		if(!$studentclass){
    			 $data = array();
    			 $data['room_id'] = $valid->id;
    			 $data['user_id'] = $user_id;

    			 $done = DB::table('room_user')->insert($data);
    			 if($done){
    			 	$notification=array(
	                 'message'=>'Congratulation!! You are Successfully Joined in this CLassroom.',
	                 'alert-type'=>'success'
	                  );
                return Redirect()->route('all-joined-class')->with($notification); 
    			 }else{
    			 	$notification=array(
	                 'message'=>'Sorry,Could not be able to join the Class due to an Error.',
	                 'alert-type'=>'error'
	                  );
                return Redirect()->back()->with($notification); 
    			 }
    		}else{
    			$notification=array(
                 'message'=>'You are Already joined in this Class. Try with new Course code and Class Code',
                 'alert-type'=>'error'
                  );
                return Redirect()->back()->with($notification); 
    		}
    	}else{
    		 $notification=array(
                 'message'=>'Could Not Able to Join the Class. Course Code and Class Code are not Matched.',
                 'alert-type'=>'warning'
                  );
                return Redirect()->back()->with($notification); 
    	}
    }

    public function allJoinedClass(){
        return view('all_joined_class');
    }

    public function showJoinedClass($id){
        $classes = User::with('rooms')->where('id',$id)->first();
        return view('show_joined_class',compact('classes'));
    }

    public function acessClassroom($id){
        $room_details = DB::table('rooms')->where('id',$id)->first();
        $roomposts = Room::with('roomposts')->where('id',$id)->first();
        return view('acess_to_class',compact('room_details','roomposts'));
    }

     public function viewStudentPostAttachmentsById($id){
        $roomposts = Roompost::with('roompostfiles')->where('id',$id)->first();
        $roompostcomments = Roompost::with('roompostcomments')->where('id',$id)->first();
        return view('view_post_attachments_by_student',compact('roomposts','roompostcomments'));
    }

    public function deleteStudentComment($id){
        $comment = Roompostcomment::find($id);
        $success = $comment->delete();
        if($success){
            $notification=array(
                 'message'=>'Comment Successfully Deleted',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);    
            }else{
                $notification=array(
                 'message'=>'Could not be able to delete the Comment',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
            }
     } 

     public function insertStudentComment(Request $request){
        $data=array();
        $data['roompost_id']=$request->roompost_id;
        $data['user_id']=$request->user_id;
        $data['teacher_id']=$request->teacher_id;
        $data['comment']=$request->comment;
        $data['date']=$request->date;

        $success = DB::table('roompostcomments')->insert($data);
        if ($success) {
                 $notification=array(
                 'message'=>'Comment Successfully Added',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Comment',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             } 
    }

    public function viewAssignmentByClass($id){
        $roomassignments = Room::with('assignments')->where('id',$id)->first();
        return view('view_assignment_from_studnet',compact('roomassignments'));
    }

    public function submitAssignment($id){
        $assignment_details = DB::table('assignments')->where('id',$id)->first();
        return view('submit_assignment',compact('assignment_details'));
    }

    public function submitAssignmentAnswer(Request $request){
      $validatedData = $request->validate([
          'assignment_file' => 'required',
          'assignment_file.*' => 'mimes:pdf',
        ]);

        $data=array();
        $data['assignment_id']=$request->assignment_id;
        $data['user_id']=$request->user_id;
        $data['assignment_submit_date']=$request->assignment_submit_date;
        $data['assignment_submit_time']=$request->assignment_submit_time;

        $file=$request->file('assignment_file');

        if ($file) {
            $file_name = str::random(5);
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='assignmentanswer/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);
            if ($success) {
                $data['assignment_file']=$file_url;
                $assignments = DB::table('assignmentanswers')
                         ->insert($data);
              if ($assignments) {
                 $notification=array(
                 'message'=>'Your Assignment have been submitted Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to submit the Assignment ',
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

    public function deleteStudentAssignment($id){
      $delete = DB::table('assignmentanswers')
                ->where('id',$id)
                ->first();

      $file = $delete->assignment_file;
      unlink($file);

      $dltassignment = DB::table('assignmentanswers')
          ->where('id',$id)
          ->delete();

      if ($dltassignment) {
                 $notification=array(
                 'message'=>'Your Submission have been removed Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not able to delete Teacher ',
                 'alert-type'=>'warning'
                  );
                 return Redirect()->back()->with($notification);
        }   
    }

    public function showAllNotices(){
        $allnotices = DB::table('notices')->orderBy('id','desc')->paginate(4);
        return view('student_all_notice',compact('allnotices'));
    }

    public function viewNotice($id){
        $viewnotices = DB::table('notices')->where('id',$id)->first();
        return view('view_notice',compact('viewnotices'));
    }
}
