<?php

namespace Cradle\Http\Request;

use PHPUnit_Framework_TestCase;
use Cradle\Data\Registry;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-28 at 11:36:34.
 */
class Cradle_Http_Request_SessionTrait_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var SessionTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SessionTraitStub;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Http\Request\SessionTrait::getSession
     */
    public function testGetSession()
    {
		$this->object->set('session', array(
			'foo' => 'bar',
			'bar' => 'foo'
		));
		
		$this->assertEquals('bar', $this->object->getSession('foo'));
    }

    /**
     * @covers Cradle\Http\Request\SessionTrait::hasSession
     */
    public function testHasSession()
    {
		$this->object->set('session', array(
			'foo' => 'bar',
			'bar' => 'foo'
		));
		
		$this->assertTrue($this->object->hasSession('foo'));
		$this->assertFalse($this->object->hasSession('zoo'));
    }

    /**
     * @covers Cradle\Http\Request\SessionTrait::setSession
     */
    public function testSetSession()
    {
		$session = array(
			'foo' => 'bar',
			'bar' => 'foo'
		);

		$instance = $this->object->setSession($session);
		
		$this->assertInstanceOf('Cradle\Http\Request\SessionTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\Request\SessionTraitStub')) {
	class SessionTraitStub extends Registry
	{
		use SessionTrait;
	}
}