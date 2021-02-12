<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use DB;
use App\Room;
use App\Roompost;
use App\Roompostfile;
use App\Roompostcomment;
use App\Events\TeacherPostAnnouncement;
use Illuminate\Support\Facades\Mail;

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
                return Redirect()->route('manage-class')->with($notification);                      
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

    public function editClassbyId($id){
    	$data = DB::table('rooms')->where('id',$id)->first();
    	return view('teacher/edit_class',compact('data'));
    }

    public function updateClass(Request $request,$id){
    	$validatedData = $request->validate([
	    	'course_name' => 'required|max:50',
	        'course_code' => 'required|max:8',
	        'course_session' => 'required|max:15',
	        'class_section' => 'required|max:6',
        ]);

		$data=array();
        $data['course_name']=$request->course_name;
        $data['course_code']=$request->course_code;
        $data['course_session']=$request->course_session;
        $data['class_section']=$request->class_section;

       	$success = DB::table('rooms')->where('id',$id)->update($data);
              if ($success) {
                 $notification=array(
                 'message'=>'Class Successfully Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('manage-class')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Class ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }       
    }

    public function viewClassStudents($id){
        $students = Room::with('users')->where('id',$id)->first();
        return view('teacher/view_joined_students',compact('students'));
    }

    public function viewJoinedStudentProfile($id){
        $student = DB::table('users')->where('id',$id)->first();
        return view('teacher/view-student',compact('student'));
    }

    public function removeStudentByClass($user_id,$room_id){
        $dltuser = DB::table('room_user')
                ->where('user_id',$user_id)
                ->where('room_id',$room_id)
                ->delete();

        if ($dltuser) {
                 $notification=array(
                 'message'=>'Student Deleted from the Classroom',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not able to delete Student from Classroom',
                 'alert-type'=>'warning'
                  );
                 return Redirect()->back()->with($notification);
        }     
    }

    public function postClassbyId($id){
        $room_details = DB::table('rooms')->where('id',$id)->first();
        $roomposts = Room::with('roomposts')->where('id',$id)->first();
        return view('teacher/view_class_with_post',compact('room_details','roomposts'));
    }

    public function insertPostByRoomId(Request $request){
        $validatedData = $request->validate([
            'posts' => 'required',
            'file.*' => 'mimes:doc,pdf,docx,jpg,jpeg,png'
        ]);

        $data=array();
        $datas = array();
        $data['room_id']=$request->room_id;
        $data['posts']=$request->posts;
        $data['date']=$request->date;
        $files=$request->file('file');

        if($files){
            $success = DB::table('roomposts')->insertGetId($data);
            $roompost = Roompost::find($success);
            $room = Room::with('users')->find($roompost->room_id);
            event(new TeacherPostAnnouncement($roompost,$room));

            foreach($files as $file)
            {
                $file_name= str::random(5);
                $ext=strtolower($file->getClientOriginalExtension());
                $file_full_name=$file_name.'.'.$ext;
                $upload_path='roomfiles/';
                $file_url=$upload_path.$file_full_name;
                $movefile=$file->move($upload_path,$file_full_name);
                $datas['file']=$file_url;
                $datas['roompost_id']=$success;
                $done = DB::table('roompostfiles')->insert($datas);
            }
                if ($done) {
                     $notification=array(
                     'message'=>'Posts Successfully Added',
                     'alert-type'=>'success'
                      );
                    return Redirect()->back()->with($notification);                      
                }else{
                      $notification=array(
                         'message'=>'Could not be able to add the Post ',
                         'alert-type'=>'error'
                          );
                         return Redirect()->back()->with($notification);
                     }  
        }else{
            $student = DB::table('roomposts')->insertGetId($data);
            $roompost = Roompost::find($student);
            $room = Room::with('users')->find($roompost->room_id);
            event(new TeacherPostAnnouncement($roompost,$room));
              if ($student) {
                 $notification=array(
                 'message'=>'Post Successfully Inserted',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Post',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             } 
        }
    }

    public function viewPostAttachmentsById($id){
        $roomposts = Roompost::with('roompostfiles')->where('id',$id)->first();
        $roompostcomments = Roompost::with('roompostcomments')->where('id',$id)->first();
        return view('teacher/view_post_attachments',compact('roomposts','roompostcomments'));
    }

    public function insertComment(Request $request){
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

    public function deletePost($id){
        $attachments = DB::table('roompostfiles')->where('roompost_id',$id)->get();
        if($attachments){
            foreach($attachments as $attachment){
                $file = $attachment->file;
                unlink($file);
                $done = DB::table('roompostfiles')->where('roompost_id',$id)->delete();
                }
        }
        $comments = DB::table('roompostcomments')->where('roompost_id',$id)->get();
        if($comments){
            foreach($comments as $comment){
                $done = DB::table('roompostcomments')->where('roompost_id',$id)->delete();
            }
        }
        $post = Roompost::find($id);
        $success = $post->delete();
        if($success){
            $notification=array(
                 'message'=>'Post Successfully Deleted',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('manage-class')->with($notification);    
            }else{
                $notification=array(
                 'message'=>'Could not be able to delete the Post',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
            }
     }     
     public function deleteComment($id){
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

     public function takeAttendance($id){
        $students = Room::with('users')->where('id',$id)->first();
        return view('teacher/take_attendance',compact('students'));
     }
}