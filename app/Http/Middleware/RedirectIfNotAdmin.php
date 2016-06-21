<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 2016/06/14
 * Time: 22:32
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin{
    public function handle($request,Closure $next,$guard = 'admin'){
        if(!Auth::guard($guard)->check()){
            return redirect('/');
        }
        
        return $next($request);
    }
}