<?php

namespace Cradle\Http\Middleware;

use PHPUnit_Framework_TestCase;
use Cradle\Http\Middleware;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:01.
 */
class Cradle_Http_PostProcessorTrait_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var PostProcessorTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new PostProcessorTraitStub;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * covers Cradle\Http\PostProcessorTrait::getPostprocessor
     */
    public function testGetPostprocessor()
    {
        $instance = $this->object->getPostprocessor();
        $this->assertInstanceOf('Cradle\Http\Middleware', $instance);
    }

    /**
     * covers Cradle\Http\PostProcessorTrait::postprocess
     */
    public function testPostprocess()
    {
        $instance = $this->object->postprocess(function() {});
        $this->assertInstanceOf('Cradle\Http\Middleware\PostProcessorTraitStub', $instance);
    }

    /**
     * covers Cradle\Http\PostProcessorTrait::setPostprocessor
     */
    public function testSetPostprocessor()
    {
        $instance = $this->object->setPostprocessor(new Middleware);
        $this->assertInstanceOf('Cradle\Http\Middleware\PostProcessorTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\PostProcessorTraitStub')) {
    class PostProcessorTraitStub
    {
        use PostProcessorTrait;
    }
}
