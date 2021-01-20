<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Admin;
use App\Teacher;

class TeacherController extends Controller
{
     public function teacher(){
    	return view('admin/add_teacher');
    }

    //insert teacher 

    public function insertTeacher(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:users|max:255',
        'password' => 'required|max:25',
        'phone' => 'required|max:11',
        'department' => 'required',
        'photo' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['phone']=$request->phone;
        $data['department']=$request->department;
        $image=$request->file('photo');

        if ($image) {
            $image_name = str::random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='teachers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $teacher = DB::table('teachers')
                         ->insert($data);
              if ($teacher) {
                 $notification=array(
                 'message'=>'Teacher Successfully Added',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-teacher')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to add the Teacher ',
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

    // select teacher list from database

    public function teacherlist(){
    	$teachers = Teacher::all();
    	return view('admin/all_teacher',compact('teachers'));
    }

     // delete teacher list from database

    public function deleteteacher($id){
    	$delete = DB::table('teachers')
    			->where('id',$id)
    			->first();

    	$photo = $delete->photo;
    	unlink($photo);

    	$dltteacher = DB::table('teachers')
    			->where('id',$id)
    			->delete();

    	if ($dltteacher) {
                 $notification=array(
                 'message'=>'Teacher Deleted Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-teacher')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not able to delete Teacher ',
                 'alert-type'=>'warning'
                  );
                 return Redirect()->back()->with($notification);
        }     
    }

     //edit teacher

    public function editteacher($id){
    	$edit =  DB::table('teachers')
    			->where('id',$id)
    			->first();
    	return view('admin/editteacher', compact('edit'));
    }

    //update teacher

    public function updateteacher(Request $request,$id){
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required|max:11',
        'department' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['department']=$request->department;
        $image=$request->file('photo');

        if ($image) {
            $image_name= str::random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='teachers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img = DB::table('teachers')->where('id',$id)->first();
                $img_path = $img->photo;
                unlink($img_path);
                $teacher = DB::table('teachers')
                         ->where('id',$id)
                         ->update($data);
              if ($teacher) {
                 $notification=array(
                 'message'=>'Teacher Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-teacher')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to update the Teacher Information',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  $teacher = DB::table('teachers')
                         ->where('id',$id)
                         ->update($data);
              if ($teacher) {
                 $notification=array(
                 'message'=>'Teacher Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all-teacher')->with($notification);                      
             }else{
              $notification=array(
                 'message'=>'Could not be able to update the teacher Information',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }  
        }
    }
}
