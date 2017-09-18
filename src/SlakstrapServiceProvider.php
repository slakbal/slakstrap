<?php

namespace Slakbal\Slakstrap;

use Collective\Html\FormFacade;
use Collective\Html\HtmlServiceProvider;
use Illuminate\Support\Facades\Blade;

class SlakstrapServiceProvider extends HtmlServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false; //must be false for the routes to work


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

        $this->bladeDirectives();

        $this->customComponents();
    }


    private function bladeDirectives()
    {
        //dd
        Blade::directive('dd', function ($expression) {
            return "<?php dd({$expression}); ?>";
        });

        //dump
        Blade::directive('dump', function ($expression) {
            return "<?php dump({$expression}); ?>";
        });

        //fontawesome
        Blade::directive('icon', function ($expression) {
            return "<i class='fa fa-" . $this->stripQuotes($expression) . "' aria-hidden='true'></i>";
        });

        //set javascript window variable
        Blade::directive('set', function ($arguments) {
            list($var, $data) = explode(',', str_replace(['(', ')', ' ', "'"], '', $arguments));

            return "<?php echo \"<script>window['{$var}']= {$data};</script>\" ?>";
        });

        //inject javascript
        Blade::directive('script', function ($script) {
            return "<?php echo \"<script>{$script}</script>\" ?>";
        });

    }


    private function customComponents()
    {
        FormFacade::component('bsInput', 'slakstrap::_blade.input', ['type', 'name', 'label' => null, 'value' => null, 'attributes' => [], 'help' => null]);
    }


    /**
     * Strip single quotes.
     *
     * @param  string $expression
     *
     * @return string
     */
    private static function stripQuotes($expression)
    {
        return str_replace("'", '', $expression);
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