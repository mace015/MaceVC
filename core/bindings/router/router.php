<?php

    use Illuminate\Http\Request;
    use Illuminate\Routing\UrlGenerator;

    $controllersDir = $__PATH . 'app/controllers';

    Illuminate\Support\Classloader::register();
    Illuminate\Support\Classloader::addDirectories(array($controllersDir));

    $app = new Illuminate\Container\Container;
    Illuminate\Support\Facades\Facade::setFacadeApplication($app);

    $app['app'] = $app;
    $app['env'] = 'production';

    with(new Illuminate\Events\EventServiceProvider($app))->register();
    with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

    $router = $app['router'];

    $middlewares = '';

    foreach ($__CONFIG['app']['middleware'] as $key => $middleware){
        $__CONFIG['app']['middleware'][$key] = '\\' . ltrim($middleware, '\\');
    }

    $router->group(array('middleware' => $__CONFIG['app']['middleware']), function() use ($__PATH, $router){

        require $__PATH . 'app/routes.php';

    });

    $app['router'] = $router;

    $request = new Request;

    $UrlWrapper = new UrlGenerator($router->getRoutes(), $request);
    $UrlWrapper->forceRootUrl($__CONFIG['app']['url']);

    class URL {

        public static function redirect($url){

            return header("Location: " . $url);

        }

        public static function __callStatic($name, $args){

            global $UrlWrapper;

    		return call_user_func_array([$UrlWrapper, $name], $args);

    	}

    }

    $request = Illuminate\Http\Request::createFromGlobals();
    $response = $app['router']->dispatch($request);

    $response->send();

?>
