<?php namespace Middleware;

    use Closure, Exception;
    use \Volnix\CSRF\CSRF as CSRF;

    class CsrfToken {

        public function handle($request, Closure $next){

            if($request->method() == 'POST'){

                if (!CSRF::validate($_POST)){
                    throw new Exception('CSRF token mismatch!');
                }

            }

            return $next($request);

        }

    }

?>
