<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function dashboard(){
        $user = DB::table('users')->count();
        $teacher = DB::table('teachers')->count();
        $notice = DB::table('notices')->count();
        $class = DB::table('rooms')->count();
    	return view('admin.dashboard',compact('user','teacher','notice','class'));
    }
}
