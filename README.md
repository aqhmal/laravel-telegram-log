# Laravel Telegram Log

Laravel/Lumen package to send logs to Telegram via Telegram Bot. This package adds the Lumen support for [this](https://github.com/rafaellaurindo/laravel-telegram-logging) Laravel package.

This version supports
- Laravel 5.6, 5.7, 5.8, 6.x, 7.x, and 8.x.
- Lumen 8.x (older version not tested)

[![PHP Version Require](https://poser.pugx.org/aqhmal/laravel-telegram-log/require/php)](https://packagist.org/packages/aqhmal/laravel-telegram-log)
[![Total Downloads](https://poser.pugx.org/aqhmal/laravel-telegram-log/downloads)](https://packagist.org/packages/aqhmal/laravel-telegram-log)
[![Version](http://poser.pugx.org/aqhmal/laravel-telegram-log/version)](https://packagist.org/packages/aqhmal/laravel-telegram-log)
[![license](https://img.shields.io/github/license/aqhmal/laravel-telegram-log.svg)](https://github.com/aqhmal/laravel-telegram-log/blob/main/LICENSE.md)

## Installation

1. Install via composer
```bash
composer require aqhmal/laravel-telegram-log
```

2. Add or create a new channel in **config/logging.php**.
```php
'telegram' => [
    'driver' => 'custom',
    'via' => Aqhmal\TelegramLog\TelegramLog::class,
    'level' => env('LOG_LEVEL', 'debug'),
]
```

If you use stack as the default log channel, you can append the telegram channel in it.
```php
'stack' => [
    'driver' => 'stack',
    'channels' => ['single', 'telegram'],
]
```

3. Add in your **.env** the following variables with its value.
```bash
TELEGRAM_BOT_TOKEN=bot_token
TELEGRAM_CHAT_ID=chat_id
```

4. Change the `LOG_CHANNEL` value in your **.env** to `telegram`
```bash
LOG_CHANNEL=telegram
```

## Lumen Support

Register a new Service Provider in **bootstrap/app.php**.
```php
$app->register(Aqhmal\TelegramLog\TelegramLogServiceProvider::class);
```

## Usage

You may write information to the logs using the Log facade. Refer [here](https://laravel.com/docs/logging#writing-log-messages) for more detail.

```php
use Illuminate\Support\Facades\Log;

Log::emergency($message);
Log::alert($message);
Log::critical($message);
Log::error($message);
Log::warning($message);
Log::notice($message);
Log::info($message);
Log::debug($message);
```

## License

This Telegram log package is licensed under the [MIT license](https://github.com/aqhmal/laravel-telegram-log/blob/main/LICENSE.md).
