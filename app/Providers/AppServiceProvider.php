<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Laravel Fortify'dan LoginResponse kontratını içe aktarır
use Laravel\Fortify\Contracts\LoginResponse;
// Kendi LoginResponse sınıfımızı içe aktarır
use App\Http\Responses\LoginResponse as CustomLoginResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * Bu metod, servis container'a servis kayıtları yapmak için kullanılır.
     * Şu anda herhangi bir kayıt yapılmamaktadır.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * Bu metod, uygulama başlarken çalışır.
     * Burada Laravel'in Fortify LoginResponse kontratını,
     * kendi LoginResponse sınıfımızla değiştiriyoruz.
     * Böylece login sonrası rol bazlı yönlendirme yapılacak.
     */
    public function boot(): void
    {
        $this->app->bind(LoginResponse::class, CustomLoginResponse::class);
    }
}
