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
        $this->setLogFile(vfsStream::url("myrootdir/mylog.txt"));
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
        $this->log('abc');
        $this->read()->shouldEndWith('abc' . PHP_EOL);
    }
}
