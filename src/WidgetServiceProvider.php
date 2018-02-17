<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 17.02.2018
 * Time: 14:09
 */

namespace Lans8097\LaravelWidget;


use Illuminate\Support\ServiceProvider;
use App;
use Blade;

class WidgetServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes(
            [__DIR__.'../app/' => app_path().'/'],
            [__DIR__.'../config/' => config_path().'/'],
            [__DIR__.'../resources/'=> resource_path().'/'
            ]);

        Blade::directive('widget', function ($name) {
            return "<?php echo app('widget')->show($name); ?>";
        });

        /*
         * Регистрируется (добавляем) каталог для хранения шаблонов виджетов
         * app\Widgets\view
         */
        $this->loadViewsFrom((resource_path().'/widgets/'), 'Widgets');
    }

    public function register()
    {

        App::singleton('widget', function(){
            return new \Lans8097\LaravelWidget\Widget();
        });

    }
}