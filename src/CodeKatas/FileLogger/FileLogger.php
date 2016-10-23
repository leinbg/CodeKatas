<?php

namespace CodeKatas\FileLogger;

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
     * @var string
     */
    protected $logDir;

    /**
     * @var string
     */
    protected $logDate;

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
     * @param string $date
     *
     * @return bool
     */
    public function isWeekend($date)
    {
        return date('N', strtotime($date)) >= 6;
    }

    /**
     * @return string
     */
    public function getLogFile()
    {
        if (!$this->logFile) {
            $this->logFile = $this->getLogDir() . 'log_' . $this->getLogDate() . '.txt';
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

    /**
     * @return mixed
     */
    public function getLogDir()
    {
        if (!$this->logDir) {
            $this->logDir = __DIR__ . '/log/';
        }

        return $this->logDir;
    }

    /**
     * @param mixed $logDir
     */
    public function setLogDir($logDir)
    {
        $this->logDir = $logDir;
    }

    /**
     * @return mixed
     */
    public function getLogDate()
    {
        if (!$this->logDate) {
            $this->logDate = date('Ymd');
        }

        if ($this->isWeekend($this->logDate)) {
            $this->logDate = 'weekend';
        }

        return $this->logDate;
    }

    /**
     * @param mixed $logDate
     */
    public function setLogDate($logDate)
    {
        $this->logDate = $logDate;
    }
}
