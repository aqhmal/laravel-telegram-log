<?php

namespace Aqhmal\TelegramLog;

use Monolog\Logger;

class TelegramLog
{
    /**
     * Create a new Logger instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        return new Logger(config('app.name'), [
            new TelegramLogHandler($config['level']),
        ]);
    }
}
