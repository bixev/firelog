This library helps you to deal with FirePHP and ChromePHP logging

This is like vardump, but into the console, so it does not break the flow.

__Ajax compliant ;)__

# Installation

## Composer

It's recommended that you use Composer to install InterventionSDK.

```bash
composer require bixev/firelog "~1.0"
```

This will install this library and all required dependencies.

so each of your php scripts need to require composer autoload file

```php
<?php

require 'vendor/autoload.php';
```

## Browser extension

### FirePHP

__Requires Firebug__

under Firefox : tools > modules > extensions > look for "FirePHP"

You need then to activate all firebug pannels

Manual : http://www.firephp.org/

### ChromePHP

Install the extension : https://chrome.google.com/webstore/detail/chromephp/noaneddfkdjfnfdakjjmocngnfkfehhd

you need to activate the extension by clicking the button in chrome

Manual : http://craig.is/writing/chrome-logger


# Usage

## Simple

simply call the method

```php
\Bixev\Firelog\Firelog::log($yourObject);
\Bixev\Firelog\Firelog::log($yourObject, $label);
\Bixev\Firelog\Firelog::log($yourObject, $label, \Bixev\Firelog\LoggerLevel::LEVEL_WARN);
```

Go into the browser console, you will see your logs

You get your object.

# Notes

ChromePHP uses cookies, Firephp uses multiple headers.

FirePHP supports bigger objects. In Chrome you will see `too big headers`in the console if you log too big objects. In that case Firefox should give you correct log.
