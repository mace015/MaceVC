<?php

    use Whoops\Run as Error;
    use Whoops\Handler\PrettyPageHandler as PrettyErrors;

    $error = new Error;
    $error->pushHandler(new PrettyErrors);
    $error->register();

?>
