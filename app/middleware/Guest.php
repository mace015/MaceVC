<?php namespace Middleware;

    use Closure;
    use Auth, Redirect, URL;

    class Guest {

        public function handle($request, Closure $next){

            if (Auth::check()){

                Redirect::to(URL::to('/'));

            }

            return $next($request);

        }

    }

?>
