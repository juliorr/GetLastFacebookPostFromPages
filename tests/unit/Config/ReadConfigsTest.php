<?php
namespace tests\unit\Config;

use GetLastFacebookPostFromPages\Config\ReadConfigs;
use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;
use SplFileObject;

class ReadConfigsTest extends PHPUnit_Framework_TestCase
{
    /** @var ReadConfigs */
    private $sut;
    /** @var SplFileObject | PHPUnit_Framework_MockObject_MockObject*/
    private $fileObject;

    protected function setUp()
    {
        parent::setUp();
        $this->fileObject = $this->getMockBuilder(SplFileObject::class)
            ->setConstructorArgs(['/dev/null'])
            ->getMock();
        $this->sut = new ReadConfigs($this->fileObject);
    }

    protected function tearDown()
    {
        parent::tearDown();
        unset(
            $this->sut,
            $this->fileObject
        );
    }

    public function testGetConfigEmpty()
    {
        $expected = '';
        $this->fileObject->expects(static::any())
            ->method('fread')
            ->willReturn('{}');
        $this->sut = new ReadConfigs($this->fileObject);
        $result = $this->sut->getConfig('some_key');

        static::assertEquals($expected, $result);
    }

    public function testGetConfigWithOnlyOneValue()
    {
        $expected = 'expected_value';
        $this->fileObject->expects(static::any())
            ->method('fread')
            ->willReturn('{"some_key":"expected_value", "another_key":"another_value"}');
        $this->sut = new ReadConfigs($this->fileObject);
        $result = $this->sut->getConfig('some_key');

        static::assertEquals($expected, $result);
    }
}
