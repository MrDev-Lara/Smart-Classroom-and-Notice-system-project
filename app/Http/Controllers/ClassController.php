<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

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
}
