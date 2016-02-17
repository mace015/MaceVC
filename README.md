# MaceVC, a PHP framework, version 0.6.

MaceVC, is a PHP framework inspired heavily by Laravel, and build on several Laravel components and other populair packages, anyone familiar with Laravel will feel right at home in MaceVC.

Some of the features supported by MaceVC:

 * Routes (using the illuminate/routing package).
 * Middlewares (route specific middlewares and global middlewares).
 * Eloquent ORM.
 * Views with the Blade templating engine.
 * Pretty error messaging in the Laravel 4 style.
 * CLI (Command Line Interface) for easily creating Controllers, Models and Middlewares!
 * Easy mailing with the build in mail class!


There are lots of features that have yet to be implemented, if you have any good ideas, feel free to submit a pull request!

Get started now!

```
git clone https://github.com/mace015/MaceVC.git

cd MaceVC

composer install
```

### Contributors:

 * [Mace Muilman](http://macemuilman.nl) ([Github](https://github.com/mace015)) Creator of MaceVC
 * Want to add your name here? Create something great and submit a pull request!

### Changelog:

* 0.6

Added a custom mail class (build on top of phpmailer) to easily send mails!
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
