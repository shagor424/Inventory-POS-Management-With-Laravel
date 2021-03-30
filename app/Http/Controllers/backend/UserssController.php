<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Auth;
use DB;
use Hash;

class UserssController extends Controller
{
     public function view(){
     	$userss =User::all();
     	return view('backend.userss.userss-view',compact('userss'));
     }

     public function add(){
     	$roles = Role::all();
     	return view('backend.userss.userss-add',compact('roles'));
     } 

     public function store(Request $request){
           $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
        ]);
           $user = new User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->mobile = $request->mobile;
           $user->address = $request->address;
           $user->password = Hash::make($request->password);
           $user->save();

           if($request->roles){
           	$user->assignRole($request->roles);
           }
     	
     	return redirect()->route('userss.view')->with('success','User Added Successfully');
     }


      public function edit($id){
          $userss = User::find($id);
          $roles = Role::all();
          return view('backend.userss.userss-edit',compact('roles','userss'));
     }

       public function update(Request $request,$id){

       	$user = User::find($id);
          $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id
        ]);
         
           $user->name = $request->name;
           $user->email = $request->email;
           $user->mobile = $request->mobile;
           $user->address = $request->address;
           if($request->password){
           	 $user->password = Hash::make($request->password);
           }
          
           $user->save();
           $user->roles()->detach();
           if($request->roles){
           	$user->assignRole($request->roles);
           }
     	
     	return redirect()->route('userss.view')->with('success','User Updated Successfully');
     }

      public function delete($id){

          $userss = User::find($id);
          if (!is_null($userss)){
               $userss->delete();
          }
          return redirect()->route('userss.view')->with('success','User Deleted Successfully');
     }
}
