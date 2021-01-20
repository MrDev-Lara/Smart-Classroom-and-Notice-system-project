<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Userdetail;
use DB;

class StudentController extends Controller
{
    public function profile(){
    	return view('student_profile');
    }

    public function setskill(){
    	return view('set_skill_set');
    }

    public function setInformation(Request $request){
    	$userdetail = new Userdetail;

    	$userdetail->user_id = $request->user_id;
    	$userdetail->biography = $request->biography;
    	$userdetail->about = $request->about;

    	$done = $userdetail->save();

    	 if ($done) {
                 $notification=array(
                 'message'=>'Information Successfully Added',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Informations ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }       
    }

    public function updateInformation(Request $request,$id){
    	$data=array();

    	$data['biography']=$request->biography;
        $data['about']=$request->about;

        $done = DB::table('userdetails')
                   ->where('user_id',$id)
                   ->update($data);
        if ($done) {
                 $notification=array(
                 'message'=>'Information Successfully Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Informations ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }    
    }

    public function updatePrivacy(Request $request,$id){
    	$data=array();

    	$data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['password']=Hash::make($request->newpass);

        $student = DB::table('users')->where('id',$id)->update($data);
      if ($student) {
         $notification=array(
         'message'=>'Your Profile has been Successfully Updated',
         'alert-type'=>'success'
          );
        return Redirect()->back()->with($notification);                      
     }else{
      $notification=array(
         'message'=>'Could not be able to add the Student ',
         'alert-type'=>'error'
          );
         return Redirect()->back()->with($notification);
     }       
    }
}
