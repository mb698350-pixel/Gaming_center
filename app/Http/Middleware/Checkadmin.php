<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Checkadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            redirect('auth.login');
        }

        // اگر ایمیل کاربر admin نیست
        if (Auth::user()->email !== 'admin@gmail.com') {
            abort(403,'!شما دسترسی به این صفحه ندارید');
        }
        return $next($request);
    }
}
