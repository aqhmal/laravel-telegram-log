# Lumen Telegram Log

A package to send Lumen logs to Telegram via Telegram Bot.

This package adds the Lumen support for [this](https://github.com/rafaellaurindo/laravel-telegram-logging) Laravel package.

Currently tested for support Lumen 8 and not tested yet for earlier versions.

## Installation

1. Install via composer
```bash
composer require aqhmal/lumen-telegram-log
```

2. Register a new Service Provider in **bootstrap/app.php**.
```php
$app->register(Aqhmal\TelegramLog\TelegramLogServiceProvider::class);
```

3. Add or create a new channel in **config/logging.php**.
```php
'telegram' => [
    'driver' => 'custom',
    'via' => Aqhmal\TelegramLog\TelegramLog::class,
    'level' => env('LOG_LEVEL', 'debug'),
]
```

Or, if you use stack as the default log channel, you can just append the telegram channel in it.
```php
'stack' => [
    'driver' => 'stack',
    'channels' => ['single', 'telegram'],
]
```

4. Add in your **.env** the following variables with its value.
```bash
TELEGRAM_BOT_TOKEN=bot_token
TELEGRAM_CHAT_ID=chat_id
```

5. Change the `LOG_CHANNEL` value in your **.env** to `telegram`
```bash
LOG_CHANNEL=telegram
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

This Lumen package is open-sourced software licensed under the [MIT license](https://github.com/aqhmal/lumen-telegram-log/blob/main/LICENSE.md).
