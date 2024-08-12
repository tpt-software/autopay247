<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;

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
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        
        if(str_contains(env('APP_URL'),'https')){
            URL::forceScheme('https');
        }
        $data = cache('banks');
        if(!$data){
            $data = $this->apiBank();
            cache(['banks' => $data], now()->addMinutes(100000000));
        }

        $banks = $data['data'];
        View::share('banks', $banks);
    }

    public function apiBank()
    {
        $response = Http::get('https://api.vietqr.io/v2/banks');
        $result = $response->json();
        return $result;
    }
}