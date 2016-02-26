<?php

    use Symfony\Component\Console\Application;

    $application = new Application("MaceVC Framework CLI", "0.9.1");

    $application->add(new Console\Command\MakeController\MakeControllerCommand());
    $application->add(new Console\Command\MakeMiddleware\MakeMiddlewareCommand());
    $application->add(new Console\Command\MakeModel\MakeModelCommand());

    $application->run();

?>
