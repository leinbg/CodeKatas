<?php

namespace CodeKatas\FileLogger;

/**
 * Class FileLogger
 *
 * @package CodeKatas\FileLogger
 */
/**
 * Class FileLogger
 *
 * @package CodeKatas\FileLogger
 */
class FileLogger
{

    /**
     * @var string
     */
    protected $logFile = __DIR__ . '/logs/log.txt';

    /**
     * @param $str
     */
    public function log($str)
    {
        $logData = $str . PHP_EOL;

        file_put_contents($this->logFile, $logData, FILE_APPEND);
    }

    /**
     * @return string
     */
    public function read()
    {
        return file_get_contents($this->logFile);
    }

    /**
     * @return string
     */
    public function getLogFile()
    {
        return $this->logFile;
    }

    /**
     * @param string $logFile
     */
    public function setLogFile($logFile)
    {
        $this->logFile = $logFile;
    }
}
