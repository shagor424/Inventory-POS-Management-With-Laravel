<?php 

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function index(){
    	$id = Auth::user()->id; 
    	$user = User::find($id);
    	return view('user.layouts.user-home',compact('user'));
    }
}
