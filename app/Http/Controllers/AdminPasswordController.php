<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests;

class AdminPasswordController extends Controller
{
    //
    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */

    protected $redirectTo = '/admin/login';
    protected $linkRequestView = 'admin.email';
    protected $resetView = 'admin.reset';
    protected $guard = 'admin';
    protected $broker = 'admin';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }
}
