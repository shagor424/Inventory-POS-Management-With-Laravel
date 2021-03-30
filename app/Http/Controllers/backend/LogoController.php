<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Logo;


class LogoController extends Controller
{
      public function view(){
        $data['countlogo'] = Logo::count();
    $data['alldata'] = Logo::all();
    return view('backend.logo.view-logo',$data);
    }

    public function add(){

    	return view('backend.logo.add-logo');
    }
    
     public function store(Request $request){
    	$data = new Logo();
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/logoimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('images.logos.view')->with('success','Logo Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Logo::find($id);
            return view('backend.logo.edit-logo',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Logo::find($id);
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/logoimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/logoimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('images.logos.view')->with('success','Logo Updated Successfully');

        }

          public function delete($id){
            $logo = Logo::find($id);

          if (file_exists('public/upload/logoimage/' . $logo->image) AND !
            empty($logo->image)){
               unlink('public/upload/logoimage/' . $logo->image);
       }
            $logo->delete();
            return redirect()->route('images.logos.view')->with('success','Logo Deleted Successfully');

          }  
    }
