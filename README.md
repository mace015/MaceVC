# MaceVC, a PHP framework, version 0.8.

MaceVC, is a PHP framework inspired heavily by Laravel, and build on several Laravel components and other populair packages, anyone familiar with Laravel will feel right at home in MaceVC.

Some of the features supported by MaceVC:

 * Routing.
 * Middlewares (route specific middlewares and global middlewares).
 * Eloquent ORM.
 * Views with the Blade templating engine.
 * Pretty error messaging in the Laravel 4 style.
 * CLI (Command Line Interface) for easily creating Controllers, Models and Middlewares!
 * Easy mailing with the build-in mail class!

There are lots of features that have yet to be implemented, if you have any good ideas, feel free to submit a pull request!

Get started now!

```
git clone https://github.com/mace015/MaceVC.git

cd MaceVC

composer install
```

### Contributors:

 * [Mace Muilman](http://macemuilman.nl) ([Github](https://github.com/mace015)) Creator of MaceVC
 * [Martijn de Ridder](http://moodles.nl) ([Github](https://github.com/moodlesmedia)) Extensive testing
 * Want to add your name here? Create something great and submit a pull request!

### Changelog:

* 0.8

Added an easy URL class that can redirect to other url's with `URL::redirect($url)`, resolve relative URIs (`URL::to('test')` == `http://baseurl.dev/test`) and it can resolve URL's based on route names (`$router->get('/testRoute', array('as' => 'test'));` => `URL::route('test')` = `http://baseurl.dev/testRoute`).

Moved the production (pretty) error template to `app/views/error/error.php`, so this can easily be customized.

Added a new helper function: `newOld($new, $old)`, which return the first value that is set and not empty, either `$new` or `$old`.

Added csrf token validation for post calls, every form that is submitted with the POST method requires a hidden field that can be generated with this function: `{{ csrf_input() }}`.
If you do not wish to use csrf tokens, simply disable the CsrfToken middleware in the `config/app.php` config file.

Added a easy session driver which support the following methods:
    - `Session::store($key, $value)`, sets the session to its key and value.
    - `Session::get($key)`, returns a session with that key, if the key is left empty, all sessions will be returned.
    - `Session::delete($key)`, deletes a session with the given key.
    - `Session::flush()`, flushes all the sessions.
    - `Session::exists($key)`, returns `true` if the session exists or `false` if it does not exists.

* 0.7

Added a class for reading the config, for example, if I want to read the debug setting in the app.php file in the config folder, i would do it like this: `Config::get('app.debug')`.
I would highly recommend you use `$__CONFIG` in any custom bindings so its not dependant on the config binding!

Added a demo env file (`env_demo`) and a `.htaccess` file out of the box;

* 0.6

Added a build-in mail class (build on top of phpmailer) to easily send mails!
The `Mail::send` function accepts 3 parameters: `$view (path to a blade view)`, `$data (data passed into the blade view)`, `$callback (a callback for extended options)`.
Inside the last parameter, `$callback`, you can set any option [PHPMailer](https://github.com/PHPMailer/PHPMailer) has to offer!
```php
Mail::send('email', array('text' => 'This is an email!'), function($mail){
    $mail->addAddress('john@doe.nl', 'John Doe');
    $mail->Subject = 'This is my email subject!';
});
```

* 0.5

Added a CLI (Command Line Interface) that makes it easy to create new Controllers, Models and Middlewares.
The CLI can be easily started by using `php console` in the root folder of a MaceVC project.

* 0.4

Added a pretty error page for production when an exception is thrown, can be changed right now by simply editing `core/bindings/errors/errorTemplate.php`, later on it will be posibile to use a custom file path for this file.

* 0.3

Added routes specific and global middlewares, these are stored in `app/middlewares/`.

* 0.2

Completely overhauled the folder structure of the framework, we now have a nice `public/` folder from where the application is started.

Also added the function `asset()` to easily load assets into blade templates from the `public/` directory.

* 0.1

Today is a fantastic day, on `$this->day()` ;) we embark on an adventure to create a beautiful framework inspired by Laravel.

Added Eloquent ORM (database driver), pretty errors, routing (laravel style), the awesome blade templating engine and last but not least, `.env` environment variables.
