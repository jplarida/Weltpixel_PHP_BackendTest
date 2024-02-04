<?php

namespace Builtins;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
/******
* Class extends Monolog for microservices.
* Supports log levels: emergency, critical, alert, error, warning, debug, info.
* Outputs logs to a specified file.
* Optionally displays logs on the console based on environment (not in 'production').
******/
class LoggerService extends Logger
{
    protected $consoleOutput;

    public function __construct($name = 'microservice', $logPath = 'logs/microservice.log', $consoleOutput = null)
    {
        parent::__construct($name);
        
        if ($consoleOutput === null) {
            $consoleOutput = getenv('APP_DEBUG');
        }
        
        $this->consoleOutput = $consoleOutput;

        $this->pushHandler(new StreamHandler($logPath, Logger::DEBUG));
    }

    public function logEmergency($message, array $context = array())
    {
        $this->addRecord(Logger::EMERGENCY, $message, $context);
    }

    public function logCritical($message, array $context = array())
    {
        $this->addRecord(Logger::CRITICAL, $message, $context);
    }

    public function logAlert($message, array $context = array())
    {
        $this->addRecord(Logger::ALERT, $message, $context);
    }

    public function logError($message, array $context = array())
    {
        $this->addRecord(Logger::ERROR, $message, $context);
    }

    public function logWarning($message, array $context = array())
    {
        $this->addRecord(Logger::WARNING, $message, $context);
    }

    public function logDebug($message, array $context = array())
    {
        $this->addRecord(Logger::DEBUG, $message, $context);
    }

    public function logInfo($message, array $context = array())
    {
        $this->addRecord(Logger::INFO, $message, $context);
        
        if ($this->consoleOutput && getenv('APP_ENV') !== 'production') {
            echo "[INFO] $message\n";
        }
    }
}
