<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        // التحقق من تسجيل الدخول
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // التحقق من دور المستخدم
        $user = auth()->user();
        if ($user->role != 0 && $user->role != 1) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
