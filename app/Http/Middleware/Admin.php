<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\User;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request)
    {   
        $a = User::where('role','admin')->first();

        if($request->session()->has('loginId')){
            return route('admin');
        }
    }
}
