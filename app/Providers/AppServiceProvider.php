<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        Str::macro('toDate', function ($date, $default = 'Não Definida')
        {
            setlocale(LC_TIME, 'Portuguese');
            Carbon::setLocale('pt');

            return empty($date) ? $default : Carbon::parse($date)->formatLocalized('%m/%Y');
        });

        Str::macro('toDateAlt', function ($date, $default = 'Não Definida')
        {
            setlocale(LC_TIME, 'Portuguese');
            Carbon::setLocale('pt');

            return empty($date) ? $default : Carbon::parse($date)->formatLocalized('%d de %b. de %Y');
        });

        Str::macro('formatBytes', function ($bytes, $precision = 2)
        {
            $units = array('B', 'KB', 'MB', 'GB', 'TB');

            $bytes = max($bytes, 0);
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
            $pow = min($pow, count($units) - 1);

            // Uncomment one of the following alternatives
            $bytes /= pow(1024, $pow);
            // $bytes /= (1 << (10 * $pow));

            return round($bytes, $precision) . ' ' . $units[$pow];
        });

//        Str::macro('userAvatar', function ($id) {
//            $user = User::where('id', '=', $id)->first();
//            $mediaItem = $user->getMedia('Avatars')->last();
//            $avatar = $mediaItem != null ? $mediaItem->getUrl() : '';
//
////           dd($avatar);
//            return $avatar;
//        });
    }
}
