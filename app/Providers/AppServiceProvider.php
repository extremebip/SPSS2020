<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Collective\Html\FormFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * List of repositories that needs to be binded
     *
     * @var array
     */
    private $repositories = [
        'DetailPesertaRepository',
        'JawabanRepository',
        'PembayaranRepository',
        'PesertaRepository',
        'TimelineRepository',
    ];

    /**
     * List of services that needs to be binded
     *
     * @var array
     */
    private $services = [
        'AuthService',
        'DashboardService',
        'LombaService',
        'RegistrasiService',
        'TimelineService'
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register all repositories
        foreach ($this->repositories as $repository) {
            $this->app->bind("App\Repository\Contracts\I{$repository}",
                             "App\Repository\Repositories\\{$repository}");
        }

        // Register all services
        foreach ($this->services as $service) {
            $this->app->bind("App\Service\Contracts\I{$service}", 
                             "App\Service\Modules\\{$service}");
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Group custome collection features macro
     * 
     * @return void
     */
    public function collectionMacro()
    {
        Collection::macro('toDropdown', function ($value_key, $text_key)
        {
            return $this->mapWithKeys(function ($item) use ($value_key, $text_key)
            {
                return [$item[$value_key] => $item[$text_key]];
            });
        });
    }
}
