<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;

class StudentController extends Controller
{
  
    public function add(){
     $roles = Role::get();
    	return view('user.admission.add-user',compact('roles'));
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'name'=>'required',
            'dob'=>'required',
            'edu'=>'required',
            'gender'=>'required',
            'course'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'password'=>'required', 'string', 'min:8', 'confirmed',

        ]);
       
         $code = rand(000000,999999);
    	$data = new User();
        $data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->dob = $request->dob;
    	$data->address = $request->address;
    	$data->gender = $request->gender;
    	$data->edu = $request->edu;
    	$data->course = $request->course;
        $data->password = Hash::make($request->password);
    	$data->code = $code;
    	$data->save();

    	return redirect()->route('posts.admissionside')->with('success','Admission Successfully-- Plese Login!!');
    }
      
}
