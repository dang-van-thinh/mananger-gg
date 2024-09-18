<?php

namespace App\Providers;

use App\Http\Service\SettingService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    public function boot(SettingService $settingService): void
    {
        Paginator::useBootstrapFive();

        // Chia sẻ cài đặt với tất cả các view
        if (Schema::hasTable('settings')) {
            $settings = [
                'settingLogo' => $settingService->getOrCreateLogo(),
                'settingLogoTab' => $settingService->getOrCreateLogoTab(),
            ];

            View::share($settings);
        }
    }
}
