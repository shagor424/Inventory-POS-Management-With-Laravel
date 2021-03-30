<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Hash;
class usercontroller extends Controller
{ 
    public function view(){
    $data['alldata'] = User::all();
    return view('backend.user.view-user',$data);
    }

    public function add(){
     $roles = Role::get();
    	return view('backend.user.add-user',compact('roles'));
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email'

        ]);
        $code = rand(000000,999999);
        
    	$data = new User();
    	$data->role_id = $request->role_id;
        $data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
        $data->password = Hash::make($code);
    	$data->code = $code;
    	$data->save();

    	return redirect()->route('users.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = User::find($id);
            $roles = Role::get();
            return view('backend.user.edit-user',compact('editdata','roles'));

        }

        public function update(Request $request,$id){
            $data = User::find($id);
         $data->role_id = $request->role_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('users.view')->with('success','Data Updated Successfully');

        }

          public function delete($id){
            $user = User::find($id);

          if (file_exists('public/upload/userimage/' . $user->image) AND !
            empty($user->image)){
               unlink('public/upload/userimage/' . $user->image);
       }
            $user->delete();
            return redirect()->route('users.view')->with('success','Data Deleted Successfully');

          }  

         
}


