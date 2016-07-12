<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;

use Auth;
use Validator;

class AdminInfoController extends Controller
{
    protected $user;
    protected $guard = 'admin';

    public function __construct()
    {
        $this->middleware('auth:admin'); // 認証

        $this->user = Auth::guard('admin')->user();
        //Auth::guard('admin')->user();
        
    }

    public function getProfile()
    {
        return view('admin.profile')->with(['user' => $this->user]);
    }

    public function postProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|email|max:255|unique:users'
        ]);


        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }


        $this->user->update([
            'name'  => $request->input('name'),
            'email' => $request->input('email')
        ]);



        return redirect('/admin/home');
    }
}
