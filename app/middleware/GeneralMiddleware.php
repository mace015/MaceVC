<?php namespace Middleware;

    use Closure;

    class GeneralMiddleware {

        public function handle($request, Closure $next){

            return $next($request);

        }

    }

?>
