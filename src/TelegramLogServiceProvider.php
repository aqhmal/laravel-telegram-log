<?php

namespace Aqhmal\TelegramLog;

use Illuminate\Support\ServiceProvider;

class TelegramLogServiceProvider extends ServiceProvider
{
    /**
     * Register the Telegram Log package.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/telegram.php', 'telegram');
    }

    /**
     * Bootstrap the Telegram Log package.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/telegram.php' => config_path('telegram.php')]);
    }
}
