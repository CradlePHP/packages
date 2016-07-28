<?php

namespace Cradle\Http\Middleware;

use PHPUnit_Framework_TestCase;
use Cradle\Http\Middleware;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:01.
 */
class Cradle_Http_PreProcessorTrait_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var PreProcessorTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new PreProcessorTraitStub;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Http\PreProcessorTrait::getPreprocessor
     * @todo   Implement testGetPreprocessor().
     */
    public function testGetPreprocessor()
    {
		$instance = $this->object->getPreprocessor();
		$this->assertInstanceOf('Cradle\Http\Middleware', $instance);
    }

    /**
     * @covers Cradle\Http\PreProcessorTrait::preprocess
     * @todo   Implement testPreprocess().
     */
    public function testPreprocess()
    {
        $instance = $this->object->preprocess(function() {});
		$this->assertInstanceOf('Cradle\Http\Middleware\PreProcessorTraitStub', $instance);
    }

    /**
     * @covers Cradle\Http\PreProcessorTrait::setPreprocessor
     * @todo   Implement testSetPreprocessor().
     */
    public function testSetPreprocessor()
    {
		$instance = $this->object->setPreprocessor(new Middleware);
		$this->assertInstanceOf('Cradle\Http\Middleware\PreProcessorTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\PreProcessorTraitStub')) {
	class PreProcessorTraitStub
	{
		use PreProcessorTrait;
	}
}