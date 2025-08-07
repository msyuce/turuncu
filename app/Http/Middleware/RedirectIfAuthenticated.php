<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * Eğer kullanıcı giriş yapmışsa, rolüne göre uygun dashboard sayfasına yönlendirir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$guards
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // Kullanıcının rolüne göre yönlendirme yapılır
                if (method_exists($user, 'isAdmin') && $user->isAdmin()) {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('user.dashboard');
            }
        }

        // Eğer giriş yapılmamışsa, normal akışa devam et
        return $next($request);
    }
}
