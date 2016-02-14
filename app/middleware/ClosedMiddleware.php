<?php namespace Middleware;

    use Closure;

    class ClosedMiddleware {

        public function handle($request, Closure $next){
            
            return $next($request);

        }

    }

?>
