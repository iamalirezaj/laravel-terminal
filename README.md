# Laravel Terminal package
Run shell command easy in your laravel projects

**The package is in process.**

# Requirement
* Laravel ^5.1
* PHP ^5.5

## Install

Via Composer

``` bash
$ composer require josh/laravel-terminal
```

##Config

Add the following provider to providers part of config/app.php
``` php
Josh\Terminal\TerminalServiceProvider::class
```

and the following Facade to the aliases part
``` php
'Terminal' => Josh\Terminal\TerminalFacade::class
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
