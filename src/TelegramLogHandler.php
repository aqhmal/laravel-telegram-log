<?php

namespace Aqhmal\TelegramLog;

use Aqhmal\TelegramLog\Services\TelegramService;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TelegramLogHandler extends AbstractProcessingHandler
{
    /**
     * The application name.
     *
     * @var string
     */
    private string $applicationName;

    /**
     * The application environment.
     *
     * @var string
     */
    private string $applicationEnvironment;

    /**
     * The instance of TelegramService
     *
     * @var \Aqhmal\TelegramLog\Services\TelegramService
     */
    private $telegramService;

    /**
     * Create a new TelegramLoggerHandler instance.
     *
     * @param  string  $logLevel
     * @return void
     */
    public function __construct(string $logLevel)
    {
        $monologLevel = Logger::toMonologLevel($logLevel);
        parent::__construct($monologLevel, true);

        $this->applicationName = config('app.name');
        $this->applicationEnvironment = config('app.env');

        $this->telegramService = new TelegramService(
            config('telegram.bot_token'),
            config('telegram.chat_id'),
            config('telegram.base_url')
        );
    }

    /**
     * Send formatted log to the service.
     *
     * @param  array  $record
     * @return void
     */
    protected function write(array $record): void
    {
        $this->telegramService->sendMessage($this->formatLogText($record));
    }

    /**
     * Format the log
     *
     * @param  array  $log
     * @return string
     */
    protected function formatLogText(array $log)
    {
        $logText = '<b>Application:</b> ' . $this->applicationName . PHP_EOL;
        $logText .= '<b>Environment:</b> ' . $this->applicationEnvironment . PHP_EOL;
        $logText .= '<b>Log Level:</b> <code>' . $log['level_name'] . '</code>' . PHP_EOL;

        if (! empty($log['extra'])) {
            $logText .= '<b>Extra:</b>' . PHP_EOL . '<code>' . json_encode($log['extra']) . '</code>' . PHP_EOL;
        }

        if (! empty($log['context'])) {
            $logText .= '<b>Context:</b>' . PHP_EOL . '<code>' . json_encode($log['context']) . '</code>' . PHP_EOL;
        }

        $logText .= '<b>Message:</b>' . PHP_EOL . '<pre>' . $log['message'] . '</pre>';

        return $logText;
    }
}
