<?php

namespace App\Providers;

use App\Models\Wallet;
use App\Observers\WalletObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bladeDirectives();
        $this->registerObservers();
    }

    private function bladeDirectives()
    {
        Blade::directive('money', fn($value) => "<?php echo moneyFormat($value) ?>" );
        Blade::directive('appName', fn($value) => "<?php echo config('app.name') ?>" );
        Blade::directive('nbsp', fn($value) => "<?php echo str_replace(' ', '&nbsp;', $value) ?>" );
    }

    private function registerObservers()
    {
        Wallet::observe(WalletObserver::class);
    }
}
