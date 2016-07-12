<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Auth;
use Validator;

class UserInfoController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth'); // 認証

        $this->user = Auth::user();
    }

    public function getProfile()
    {
        return view('user.profile')->with(['user' => $this->user]);
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

//        DB::table('users')
//            ->where('name', Auth::user()->name)
//            ->update(['name' => $request->input('name')]);
//
//        DB::table('users')
//            ->where('name', Auth::user()->name)
//            ->update(['name' =>  $request->input('email')]);


        return redirect('/home');
    }
}
