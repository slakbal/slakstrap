<?php

namespace Slakbal\Slakstrap;

use Collective\Html\HtmlServiceProvider;

class SlakstrapServiceProvider extends HtmlServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'slakstrap');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/views' => resource_path('views/vendor/slakstrap'),
            ]);
        }

        //if ($this->app->runningInConsole()) {
        //    $this->publishes([
        //        __DIR__ . '/resources/views' => $this->app->resourcePath('views/vendor/slakstrap'),
        //    ], 'slakstrap');
        //}

        // Establish Views Namespace
        //if (is_dir(base_path() . '/resources/views/packages/rydurham/sentinel')) {
        //    // The package views have been published - use those views.
        //    $this->loadViewsFrom(base_path() . '/resources/views/packages/rydurham/sentinel', 'Sentinel');
        //} else {
        //    // The package views have not been published. Use the defaults.
        //    $this->loadViewsFrom(__DIR___ . '/../views/bootstrap', 'sentinel');
        //}


        //Form::component('bsInput', '_components.form.input', ['type', 'name', 'label' => null, 'value' => null, 'attributes' => [], 'help' => null]);
        //
        //Blade::directive('group', function ($expression) {
        //    return $expression;
        //});
    }


    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder()
    {
        // Register FormBuilder as singleton instance
        $this->app->singleton('form', function ($app) {
            $form = new BootFormBuilder(
                $app['html'],
                $app['url'],
                $app['view'],
                $app['session.store']->token()
            );

            // Return session store
            return $form->setSessionStore($app['session.store']);
        });
    }
}