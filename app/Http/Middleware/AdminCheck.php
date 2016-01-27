<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {     $request = new Request;
        var_dump($request->hasSession());
        /*
        try {
            $request = new Request;
            $session = $request->hasSession();
            $session = $request->session()->set('account',"wongka");
            $account = $session->get('account', null);
        } catch (Exception $e) {
            $account = null;
        }
        */
        
        if (!empty($account) && $account['access'] == "Superadmin") {
            return $next($request); 
        } else {
            return redirect()->guest('login');
        }
    }
}
