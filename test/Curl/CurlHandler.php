<?php

namespace Cradle\Curl;

use StdClass;
use PHPUnit_Framework_TestCase;
use Cradle\Resolver\ResolverHandler;
use Cradle\Profiler\InspectorHandler;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:10:59.
 */
class Cradle_Curl_CurlHandler_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var CurlHandler
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new CurlHandler(function($options) {
			$options['response'] = 'foobar';
			return $options;
		});
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Curl\CurlHandler::__call
     */
    public function test__call()
    {
		//CURLOPT_FOLLOWLOCATION
		$instance = $this->object->__call('setFollowLocation', true);
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
		
		$thrown = false;
		try {
			$this->object->__call('foobar', array());
		} catch(CurlException $e) {
			$thrown = true;
		}
		
		$this->assertTrue($thrown);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getDomDocumentResponse
     */
    public function testGetDomDocumentResponse()
    {
		$this->object = new CurlHandler(function($options) {
			return array('response' => '<?xml version="1.0" encoding="UTF-8"?>
			<foo>Bar</foo>');
		});

		$instance = $this->object->getDomDocumentResponse();
		
		$this->assertInstanceOf('DOMDocument', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getJsonResponse
     */
    public function testGetJsonResponse()
    {
		$this->object = new CurlHandler(function($options) {
			return array('response' => '{"foo":"bar"}');
		});

		$actual = $this->object->getJsonResponse();
		
		$this->assertEquals('bar', $actual['foo']);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getMeta
     */
    public function testGetMeta()
    {
		$actual = $this->object->getMeta();
		
		$this->assertTrue(is_array($actual));
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getQueryResponse
     */
    public function testGetQueryResponse()
    {
		$this->object = new CurlHandler(function($options) {
			return array('response' => 'foo=bar&bar=zoo');
		});

		$actual = $this->object->getQueryResponse();
		
		$this->assertEquals('bar', $actual['foo']);
		$this->assertEquals('zoo', $actual['bar']);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getResponse
     */
    public function testGetResponse()
    {
		$actual = $this->object->getResponse();
		
		$this->assertEquals('foobar', $actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getSimpleXmlResponse
     * @todo   Implement testGetSimpleXmlResponse().
     */
    public function testGetSimpleXmlResponse()
    {
		$this->object = new CurlHandler(function($options) {
			return array('response' => '<?xml version="1.0" encoding="UTF-8"?>
			<foo>Bar</foo>');
		});

		$instance = $this->object->getSimpleXmlResponse();
		
		$this->assertInstanceOf('SimpleXMLElement', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::offsetExists
     */
    public function testOffsetExists()
    {
		//CURLOPT_FOLLOWLOCATION
		$actual = $this->object->offsetExists('foobar');
		$this->assertFalse($actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::offsetGet
     */
    public function testOffsetGet()
    {
		//CURLOPT_FOLLOWLOCATION
		$actual = $this->object->offsetGet('foobar');
		$this->assertNull($actual);
		
		$this->object->offsetSet('FOLLOWLOCATION', 1);
		$actual = $this->object->offsetGet('FOLLOWLOCATION');
		$this->assertEquals(1, $actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::offsetSet
     */
    public function testOffsetSet()
    {
		$this->object->offsetSet('FOLLOWLOCATION', 1);
		$actual = $this->object->offsetGet('FOLLOWLOCATION');
		$this->assertEquals(1, $actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::offsetUnset
     */
    public function testOffsetUnset()
    {
		
		$this->object->offsetSet('FOLLOWLOCATION', 1);
		$this->object->offsetUnset('FOLLOWLOCATION');
		$actual = $this->object->offsetGet('FOLLOWLOCATION');
		$this->assertNull($actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::send
     */
    public function testSend()
    {
		$instance = $this->object->send();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setCustomGet
     */
    public function testSetCustomGet()
    {
		$instance = $this->object->setCustomGet();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setCustomPost
     */
    public function testSetCustomPost()
    {
		$instance = $this->object->setCustomPost();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setCustomPatch
     */
    public function testSetCustomPatch()
    {
		$instance = $this->object->setCustomPatch();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setCustomPut
     */
    public function testSetCustomPut()
    {
		$instance = $this->object->setCustomPut();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setCustomDelete
     */
    public function testSetCustomDelete()
    {
		$instance = $this->object->setCustomDelete();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setPostFields
     */
    public function testSetPostFields()
    {
		$instance = $this->object->setPostFields('foo=bar');
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setHeaders
     */
    public function testSetHeaders()
    {
		$instance = $this->object->setHeaders(array('Expect'));
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
		
		$instance = $this->object->setHeaders('Foo', 'Bar');
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setUrlParameter
     */
    public function testSetUrlParameter()
    {
		$instance = $this->object->setUrlParameter(array('Expect'));
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
		
		$instance = $this->object->setUrlParameter('Foo', 'Bar');
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::verifyHost
     */
    public function testVerifyHost()
    {
		$instance = $this->object->verifyHost();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::verifyPeer
     */
    public function testVerifyPeer()
    {
		$instance = $this->object->verifyPeer();
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::i
     */
    public function testI()
    {
        $instance1 = CurlHandler::i();
		
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance1);
		
		$instance2 = CurlHandler::i();
		
		$this->assertTrue($instance1 !== $instance2);
    }

     /**
     * @covers Cradle\Curl\CurlHandler::loop
     */
    public function testLoop()
    {
        $self = $this;
        $this->object->loop(function($i) use ($self) {
            $self->assertInstanceOf('Cradle\Curl\CurlHandler', $this);
            
            if ($i == 2) {
                return false;
            }
        });
    }

    /**
     * @covers Cradle\Curl\CurlHandler::when
     */
    public function testWhen()
    {
        $self = $this;
        $test = 'Good';
        $this->object->when(function() use ($self) {
            $self->assertInstanceOf('Cradle\Curl\CurlHandler', $this);
            return false;
        }, function() use ($self, &$test) {
            $self->assertInstanceOf('Cradle\Curl\CurlHandler', $this);
            $test = 'Bad';
        });
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getInspectorHandler
     */
    public function testGetInspectorHandler()
    {
        $instance = $this->object->getInspectorHandler();
		$this->assertInstanceOf('Cradle\Profiler\InspectorHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::inspect
     */
    public function testInspect()
    {
        ob_start();
		$this->object->inspect('foobar');
		$contents = ob_get_contents();
		ob_end_clean();  
		
		$this->assertEquals(
			'<pre>INSPECTING Variable:</pre><pre>foobar</pre>', 
			$contents
		);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::setInspectorHandler
     */
    public function testSetInspectorHandler()
    {
        $instance = $this->object->setInspectorHandler(new InspectorHandler);
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::addLogger
     */
    public function testAddLogger()
    {
        $instance = $this->object->addLogger(function() {});
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $instance);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::log
     */
    public function testLog()
    {
		$trigger = new StdClass();
		$trigger->success = null;
        $this->object->addLogger(function($trigger) {
			$trigger->success = true;
		})
		->log($trigger);
		
		
		$this->assertTrue($trigger->success);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::loadState
     */
    public function testLoadState()
    {
		$state1 = new CurlHandler();
		$state2 = new CurlHandler();
		
		$state1->saveState('state1');
		$state2->saveState('state2');
		
		$this->assertTrue($state2 === $state1->loadState('state2'));
		$this->assertTrue($state1 === $state2->loadState('state1'));
    }

    /**
     * @covers Cradle\Curl\CurlHandler::saveState
     */
    public function testSaveState()
    {
		$state1 = new CurlHandler();
		$state2 = new CurlHandler();
		
		$state1->saveState('state1');
		$state2->saveState('state2');
		
		$this->assertTrue($state2 === $state1->loadState('state2'));
		$this->assertTrue($state1 === $state2->loadState('state1'));
    }

    /**
     * @covers Cradle\Curl\CurlHandler::__callResolver
     */
    public function test__callResolver()
    {
        $actual = $this->object->addResolver(ResolverCallStub::class, function() {});
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::addResolver
     */
    public function testAddResolver()
    {
        $actual = $this->object->addResolver(ResolverCallStub::class, function() {});
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::getResolverHandler
     */
    public function testGetResolverHandler()
    {
        $actual = $this->object->getResolverHandler();
		$this->assertInstanceOf('Cradle\Resolver\ResolverHandler', $actual);
    }

    /**
     * @covers Cradle\Curl\CurlHandler::resolve
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
     * @covers Cradle\Curl\CurlHandler::resolveShared
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
     * @covers Cradle\Curl\CurlHandler::resolveStatic
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
     * @covers Cradle\Curl\CurlHandler::setResolverHandler
     */
    public function testSetResolverHandler()
    {
        $actual = $this->object->setResolverHandler(new ResolverHandler);
		$this->assertInstanceOf('Cradle\Curl\CurlHandler', $actual);
    }
}

if(!class_exists('Cradle\Curl\ResolverCallStub')) {
	class ResolverCallStub
	{
		public function foo($string)
		{
			return $string . 'foo';
		}
	}
}

if(!class_exists('Cradle\Curl\ResolverAddStub')) {
	class ResolverAddStub
	{
		public function foo($string)
		{
			return $string . 'foo';
		}
	}
}

if(!class_exists('Cradle\Curl\ResolverSharedStub')) {
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

if(!class_exists('Cradle\Curl\ResolverStaticStub')) {
	class ResolverStaticStub
	{
		public static function foo($string)
		{
			return $string . 'foo';
		}
	}
}
