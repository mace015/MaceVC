<?php

    $controllersDir = $__PATH.'controllers';
    $modelsDir = $__PATH.'models';

    Illuminate\Support\Classloader::register();
    Illuminate\Support\Classloader::addDirectories(array($controllersDir, $modelsDir));

    $app = new Illuminate\Container\Container;
    Illuminate\Support\Facades\Facade::setFacadeApplication($app);

    $app['app'] = $app;
    $app['env'] = 'production';

    with(new Illuminate\Events\EventServiceProvider($app))->register();
    with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

    $router = $app['router'];

    require $__PATH.'routes.php';

    $app['router'] = $router;

    $request = Illuminate\Http\Request::createFromGlobals();
    $response = $app['router']->dispatch($request);

    $response->send();

?>
