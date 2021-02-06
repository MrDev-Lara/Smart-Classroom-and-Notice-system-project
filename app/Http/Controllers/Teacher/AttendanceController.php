<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Room;
use App\Attendance;

class AttendanceController extends Controller
{
    public function insertAttendance(Request $request,$id){
    	$date = date('d-m-y');
    	$select = DB::table('attendances')->where('room_id',$id)->where('attend_date',$date)->first();
    	if($select){
    		$notification=array(
                 'message'=>'Attendance already Taken for Todays Date',
                 'alert-type'=>'error'
                  );
                return Redirect()->back()->with($notification);
    	}else{
    	foreach($request->user_id as $row){
    		$data[] = [
    			'room_id'=>$request->room_id,
    			'user_id'=>$row,
    			'attend'=>$request->attend[$row],
    			'attend_date'=>$request->attend_date,
    		];
    	}
    $done = DB::table('attendances')->insert($data);

     if ($done) {
                 $notification=array(
                 'message'=>'Attendance Taken successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
    	}
    }

    public function viewAttendance($id){
    	$students = DB::table('attendances')->where('room_id',$id)->select('attend_date')->groupBy('attend_date')->get();
    	$details = Room::with('attendances')->where('id',$id)->first();
    	return view('teacher/all_attendance',compact('students','details'));
    }

    public function viewStudentAttendanceByDate($room_id,$attend_date){
    	$views = DB::table('attendances')
     			->join('users','attendances.user_id','users.id')
     			->where('room_id',$room_id)
     			->where('attend_date',$attend_date)
     			->select('attendances.*','users.name','users.student_id')
     			->get();

     	return view('teacher/view_by_date',compact('views'));
    }

     public function deleteStudentAttendanceByDate($room_id,$attend_date){
    	$done = DB::table('attendances')
     			->where('room_id',$room_id)
     			->where('attend_date',$attend_date)
     			->delete();

     	if ($done) {
                 $notification=array(
                 'message'=>'Attendance Deleted successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
    }

    public function editStudentAttendanceByDate($room_id,$attend_date){
    	$date = DB::table('attendances')->where('room_id',$room_id)->where('attend_date',$attend_date)->first();

     	$edit = DB::table('attendances')
     			->join('users','attendances.user_id','users.id')
     			->where('room_id',$room_id)
     			->where('attend_date',$attend_date)
     			->select('attendances.*','users.name','users.student_id')
     			->get();

     	return view('teacher/edit_attendance_by_date',compact('date','edit'));
    }

    public function updateAttendance(Request $request,$room_id,$attend_date){
    	foreach($request->user_id as $row){
    		$data = [
    			'attend'=>$request->attend[$row],
    			'attend_date'=>$request->attend_date,
    		];

    	$ok = Attendance::where(['attend_date' => $attend_date, 'room_id' => $room_id, 'user_id' => $row])->first();
    	$done = $ok->update($data);
     	}
     	if($done) {
                 $notification=array(
                 'message'=>'Attendance Updated successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'error',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }      
    	}
  }
