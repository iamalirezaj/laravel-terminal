[![Build Status](https://travis-ci.org/MrJoshLab/laravel-terminal.svg)](https://travis-ci.org/MrJoshLab/laravel-terminal)
[![Latest Stable Version](https://poser.pugx.org/josh/laravel-terminal/v/stable)](https://packagist.org/packages/josh/laravel-terminal)
[![Total Downloads](https://poser.pugx.org/josh/laravel-terminal/downloads)](https://packagist.org/packages/josh/laravel-terminal)
[![Latest Unstable Version](https://poser.pugx.org/josh/laravel-terminal/v/unstable)](//packagist.org/packages/josh/laravel-terminal)
[![License](https://poser.pugx.org/josh/laravel-terminal/license)](https://packagist.org/packages/josh/laravel-terminal)

# Laravel Terminal package
Run shell command easy in your laravel projects

**The package is in process.**

# Requirement
* Laravel ^6
* PHP ^7.2

## Install

Via Composer

``` bash
$ composer require josh/laravel-terminal
```

## Config

Add the following provider to providers part of config/app.php
``` php
Josh\Terminal\TerminalServiceProvider::class
```

and the following Facade to the aliases part
``` php
'Terminal' => Josh\Terminal\TerminalFacade::class
```

and then run
``` bash
php artisan vendor:publish
```
for generating terminal config file into main config directory

## Usage
You can run Terminal shell commands in laravel just like this:

```php
$response = \Terminal::command('ls')->execute();
```

and you can get output of command just like this:
```php
return $response->getBody()->getContents();
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
