<?php

    use Whoops\Run;
    use Whoops\Handler\Handler;
    use Whoops\Util\TemplateHelper;

    $error = new Run;

    if ($__CONFIG['debug']){

        $error->pushHandler(new Whoops\Handler\PrettyPageHandler);

    } else {

        $error->pushHandler(function() use ($__PATH){

            (new TemplateHelper())->render($__PATH . 'core/bindings/errors/errorsTemplate.php');

            return Handler::DONE;

        });

    }

    $error->register();

?>
