<?php

namespace spec\CodeKatas\FileLogger;

use CodeKatas\FileLogger\FileLogger;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FileLoggerSpec
 *
 * @package spec\CodeKatas\FileLogger
 */
class FileLoggerSpec extends ObjectBehavior
{

    /**
     * @var vfsStreamDirectory
     */
    private $workDir;

    /**
     * @var string
     */
    private $workDirPath = 'myrootdir/';

    /**
     *
     */
    public function let()
    {
        $this->workDir = vfsStream::setup($this->workDirPath);
    }

    /**
     *
     */
    public function it_is_initializable()
    {
        $this->shouldHaveType(FileLogger::class);
    }

    /**
     *
     */
    public function it_log_string_in_a_file()
    {
        $this->setTestLogFile();

        $this->log('abc');
        $this->read()->shouldEndWith('abc' . PHP_EOL);
    }

    public function it_create_the_log_file_if_not_exist()
    {
        $this->setTestLogFile();

        $this->hasLogFile()->shouldBe(false);
        $this->log('abc');
        $this->hasLogFile()->shouldBe(true);
    }

    public function it_append_to_the_log_file_if_exist()
    {
        $this->setTestLogFile();
        $this->createTestLogFile();

        $this->hasLogFile()->shouldBe(true);
        $this->log('abc');
        $this->read()->shouldEndWith('abc' . PHP_EOL);
    }

    public function it_create_log_file_in_certain_format()
    {
        $this->setTestLogDir();
        $url = $this->workDirPath . "log_" . date("Ymd") . ".txt";

        $this->log('abc');
        $this->hasLogFile(vfsStream::url($url))->shouldBe(true);
    }

    public function it_checks_if_it_is_weekend()
    {
        $this->isWeekend(date('20161021'))->shouldBe(false); // Friday
        $this->isWeekend(date('20161022'))->shouldBe(true); // Saturday
    }

    /**
     * helper function to set test log dir in vfsStream
     */
    protected function setTestLogDir()
    {
        $logDir = $this->workDirPath;
        $this->setLogDir(vfsStream::url($logDir));
    }

    /**
     * helper function to set test log file in vfsStream
     */
    protected function setTestLogFile()
    {
        $logFile = $this->workDirPath . 'log_test.txt';
        $this->setLogFile(vfsStream::url($logFile));
    }

    /**
     * helper function to create test log file in vfsStream
     */
    protected function createTestLogFile()
    {
        $logFile = vfsStream::newFile("log_test.txt");
        $this->workDir->addChild($logFile);
    }
}
