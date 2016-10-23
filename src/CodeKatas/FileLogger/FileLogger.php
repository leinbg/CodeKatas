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
    protected $logFile;

    /**
     * @param $str
     */
    public function log($str)
    {
        $logData = $str . PHP_EOL;

        file_put_contents($this->getLogFile(), $logData, FILE_APPEND);
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
        if (!$this->logFile) {
            $this->logFile = __DIR__ . '/logs/log_' . date('Ymd') . '.txt';
        }

        return $this->logFile;
    }

    /**
     * @param string $logFile
     */
    public function setLogFile($logFile)
    {
        $this->logFile = $logFile;
    }

    /**
     * @param string $file log file path
     *
     * @return bool
     */
    public function hasLogFile($file = null)
    {
        if (!$file) {
            $file = $this->getLogFile();
        }

        return file_exists($file);
    }
}
