<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Admin;
use App\User;

class StudentController extends Controller
{
     public function student(){
    	return view('admin/add_user');
    }

    //insert student 

    public function insertStudent(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'student_id' => 'required|unique:users|max:7',
        'email' => 'required|unique:users|max:255',
        'password' => 'required|max:25',
        'phone' => 'required|max:11',
        'semester' => 'required',
        'photo' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['student_id']=$request->student_id;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['phone']=$request->phone;
        $data['semester']=$request->semester;
        $image=$request->file('photo');

        if ($image) {
            $image_name = str::random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='students/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $student = DB::table('users')
                         ->insert($data);
              if ($student) {
                 $notification=array(
                 'message'=>'Student Successfully Added',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-student')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Student ',
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

    // select student list from database

    public function studentlist(){
    	$students = User::all();
    	return view('admin/all_user',compact('students'));
    }

    // delete student list from database

    public function deletestudent($id){
    	$delete = DB::table('users')
    			->where('id',$id)
    			->first();

    	$photo = $delete->photo;
    	unlink($photo);

    	$dltuser = DB::table('users')
    			->where('id',$id)
    			->delete();

    	if ($dltuser) {
                 $notification=array(
                 'message'=>'Student Deleted',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-student')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not able to delete Student ',
                 'alert-type'=>'warning'
                  );
                 return Redirect()->back()->with($notification);
        }     
    }

    //edit student

    public function editstudent($id){
    	$edit =  DB::table('users')
    			->where('id',$id)
    			->first();
    	return view('admin/editstudent', compact('edit'));
    }

    //update student

    public function updatestudent(Request $request,$id){
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'student_id' => 'required|max:7',
        'email' => 'required|max:255',
        'phone' => 'required|max:11',
        'semester' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['student_id']=$request->student_id;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['semester']=$request->semester;
        $image=$request->file('photo');

        if ($image) {
            $image_name= str::random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='students/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img = DB::table('users')->where('id',$id)->first();
                $img_path = $img->photo;
                unlink($img_path);
                $student = DB::table('users')
                         ->where('id',$id)
                         ->update($data);
              if ($student) {
                 $notification=array(
                 'message'=>'Student Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-student')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to update the student Information',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  $student = DB::table('users')
                         ->where('id',$id)
                         ->update($data);
              if ($student) {
                 $notification=array(
                 'message'=>'Student Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-student')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to update the student Information',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }  
        }
    }

    
}
