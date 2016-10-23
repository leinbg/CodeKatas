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
     *
     */
    function let()
    {
        $this->workDir = vfsStream::setup('myrootdir');
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
        $this->setLogFile(vfsStream::url("myrootdir/log_20161023.txt"));
        $this->log('abc');
        $this->read()->shouldEndWith('abc' . PHP_EOL);
    }

    public function it_create_the_log_file_if_not_exist()
    {
        $this->setLogFile(vfsStream::url("myrootdir/log_20161023.txt"));
        $this->hasLogFile()->shouldBe(false);
        $this->log('abc');
        $this->hasLogFile()->shouldBe(true);
    }

    public function it_append_to_the_log_file_if_exist()
    {
        $this->setLogFile(vfsStream::url("myrootdir/log_20161023.txt"));
        $logFile = vfsStream::newFile("log_20161023.txt");
        $this->workDir->addChild($logFile);
        $this->hasLogFile()->shouldBe(true);
        $this->log('abc');
        $this->read()->shouldEndWith('abc' . PHP_EOL);
    }

    public function it_create_log_file_in_certain_format()
    {
        $logDir = "myrootdir/";
        $url = "myrootdir/log_" . date("Ymd") . ".txt";
        $this->setLogDir(vfsStream::url($logDir));
        $this->log('abc');
        $this->hasLogFile(vfsStream::url($url))->shouldBe(true);
    }
}
