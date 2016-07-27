<?php

namespace Cradle\Handlebars;

use StdClass;
use PHPUnit_Framework_TestCase;
use Cradle\Resolver\ResolverHandler;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:00.
 */
class Cradle_Handlebars_HandlebarsCompiler_Test extends PHPUnit_Framework_TestCase
{
	 /**
     * @var HandlebarsCompiler
     */
    protected $object;

	 /**
     * @var string
     */
    protected $source;

	 /**
     * @var string
     */
    protected $template1;

	 /**
     * @var string
     */
    protected $template2;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
		$handler = new HandlebarsHandler;
		$this->source = file_get_contents(__DIR__.'/../assets/handlebars/tokenizer.html');
        $this->object = new HandlebarsCompiler($handler, $this->source);
		
		$this->template1 = file_get_contents(__DIR__.'/../assets/handlebars/template1.php');
		$this->template2 = file_get_contents(__DIR__.'/../assets/handlebars/template2.php');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::getSource
     */
    public function testGetSource()
    {
		$template = $this->object->getSource();
		$this->assertEquals($this->source, $template);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::compile
     */
    public function testCompile()
    {
		$actual = $this->object->compile();
		$this->assertEquals($this->template1, $actual);
		
		$actual = $this->object->compile(false);
		$this->assertEquals($this->template2, $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::setOffset
     */
    public function testSetOffset()
    {
		$actual = $this->object->setOffset(3);
		$this->assertInstanceOf('Cradle\Handlebars\HandlebarsCompiler', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::__callResolver
     */
    public function test__callResolver()
    {
        $actual = $this->object->__callResolver(ResolverCallStub::class, [])->foo('bar');
		$this->assertEquals('barfoo', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::addResolver
     */
    public function testAddResolver()
    {
        $actual = $this->object->addResolver(ResolverCallStub::class, function() {});
		$this->assertInstanceOf('Cradle\Handlebars\HandlebarsCompiler', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::getResolverHandler
     */
    public function testGetResolverHandler()
    {
		$actual = $this->object->getResolverHandler();
		$this->assertInstanceOf('Cradle\Resolver\ResolverInterface', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::resolve
     */
    public function testResolve()
    {
		$actual = $this->object->addResolver(
			ResolverCallStub::class, 
			function() {
				return new ResolverAddStub();
			}
		)
		->resolve(ResolverCallStub::class)
		->foo('bar');
		
        $this->assertEquals('barfoo', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::resolveShared
     */
    public function testResolveShared()
    {
        $actual = $this
			->object
			->resolveShared(ResolverSharedStub::class)
			->reset()
			->foo('bar');
		
        $this->assertEquals('barfoo', $actual);
		
		$actual = $this
			->object
			->resolveShared(ResolverSharedStub::class)
			->foo('bar');
		
        $this->assertEquals('barbar', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::resolveStatic
     */
    public function testResolveStatic()
    {
        $actual = $this
			->object
			->resolveStatic(
				ResolverStaticStub::class, 
				'foo', 
				'bar'
			);
		
        $this->assertEquals('barfoo', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::setResolverHandler
     */
    public function testSetResolverHandler()
    {
        $actual = $this->object->setResolverHandler(new ResolverHandlerStub);
		$this->assertInstanceOf('Cradle\Handlebars\HandlebarsCompiler', $actual);
    }

    /**
     * @covers Cradle\Handlebars\HandlebarsCompiler::bindCallback
     */
    public function testBindCallback()
    {
		$trigger = new StdClass;
        $trigger->success = null;
		$trigger->test = $this;
		
		$this->object->bindCallback(function() use ($trigger) {
	    	$trigger->success = true;
			$trigger->test->assertInstanceOf('Cradle\Handlebars\HandlebarsCompiler', $this);
		});
    }
}

if(!class_exists('Cradle\Handlebars\ResolverCallStub')) {
	class ResolverCallStub
	{
		public function foo($string)
		{
			return $string . 'foo';
		}
	}
}

if(!class_exists('Cradle\Handlebars\ResolverAddStub')) {
	class ResolverAddStub
	{
		public function foo($string)
		{
			return $string . 'foo';
		}
	}
}

if(!class_exists('Cradle\Handlebars\ResolverSharedStub')) {
	class ResolverSharedStub
	{
		public $name = 'foo';
		
		public function foo($string)
		{
			$name = $this->name;
			$this->name = $string;
			return $string . $name;
		}
		
		public function reset()
		{
			$this->name = 'foo';
			return $this;
		}
	}
}

if(!class_exists('Cradle\Handlebars\ResolverStaticStub')) {
	class ResolverStaticStub
	{
		public static function foo($string)
		{
			return $string . 'foo';
		}
	}
}

if(!class_exists('Cradle\Handlebars\ResolverHandlerStub')) {
	class ResolverHandlerStub extends ResolverHandler
	{
	}
}