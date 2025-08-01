<?php declare(strict_types=1);

namespace Rollbar\Magento2\Plugin;

use Monolog\LogRecord;
use Magento\Framework\Logger\Handler\System;
use Rollbar\Payload\Level;
use Rollbar\Rollbar;

class SystemPlugin
{
    public function afterWrite(System $subject, $result, LogRecord $record)
    {
        if (isset($record['context']['exception'])) {
            Rollbar::error($record['context']['exception']);
            return;
        }

        Rollbar::log(Level::INFO, $record['formatted']);
    }
}
