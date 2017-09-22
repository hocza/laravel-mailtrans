<?php namespace Hocza\MailTrans;

use Illuminate\Support\ServiceProvider;

/**
 * A Laravel 5 Mail Translation Package
 *
 * @author: Jozsef Hocza
 */
class PackageServiceProvider extends ServiceProvider {

    protected $packageName = 'mailtrans';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/../routes.php';

        // Register Views from your package
        $this->loadViewsFrom(__DIR__.'/../views', $this->packageName);

        // Register your migration's publisher
        $this->publishes([
            __DIR__.'/../database/migrations/' => base_path('/database/migrations')
        ], 'migrations');

        // Publish your config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path($this->packageName.'.php'),
        ], 'config');

        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/config.php', $this->packageName);

        $this->app->singleton(MailTrans::class, function ($app) {
             return new MailTrans(config($this->packageName));
        });
        $this->app->alias(MailTrans::class, 'mailTrans');
    }

}
