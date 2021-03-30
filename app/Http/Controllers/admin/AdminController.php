<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
class AdminController extends Controller
{
    public function index(){
    	return view('backend.layouts.home');
    } 
}
