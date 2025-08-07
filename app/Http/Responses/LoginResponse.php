<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

/**
 * Kullanıcı giriş yaptıktan sonra rolüne göre
 * uygun dashboard sayfasına yönlendirme yapar.
 */
class LoginResponse implements LoginResponseContract
{
    /**
     * Handle the response after user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toResponse($request)
    {
        $user = Auth::user();

        // Kullanıcının rolüne göre yönlendirme URL'leri güncellendi
        return redirect()->intended(
            $user->isAdmin() ? '/admin-dashboard' : '/user-dashboard'
        );
    }
}
