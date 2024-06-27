<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();
        Model::preventLazyLoading();

        $settings = Setting::firstor(function()
        {
            return $settings = Setting::create(
                [
                    'name' => 'Amr Achraf',
                    'support_email' => 'amrachraf6690@gmail.com',
                    'support_phone' => '+201028751528',
                    'address' => 'An Nubariyah ,West Nubariyah, Beheira Governorate',
                    'facebook' => 'https://www.facebook.com/amrachraf6690',
                    'twitter' => 'https://twitter.com/amrachraf6690',
                    'instagram' => 'https://www.instagram.com/amrachraf6690',
                    'linkedin' => 'https://www.linkedin.com/in/amrachraf6690',
                    'youtube' => 'https://youtube.com/@amrachraf6699',
                    'whatsapp' => 'https://wa.me/+201028751528',
                    'github' => 'https://github.com/amrachraf6699',

                ]
            );
        });

        view()->share('settings', $settings);
    }
}
