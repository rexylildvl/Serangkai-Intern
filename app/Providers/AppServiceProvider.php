<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

   public function boot()
    {
        View::composer('layouts.admin', function ($view) {
            $newPendaftar = Pendaftaran::whereDate('created_at', Carbon::today())->count();
            $view->with('newPendaftar', $newPendaftar);
        });
    }
}
