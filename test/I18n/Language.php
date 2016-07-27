<?php

namespace Cradle\I18n;

use StdClass;
use Cradle\Profiler\InspectorHandler;
use Cradle\Event\EventHandler;
use Cradle\Resolver\ResolverHandler;

use PHPUnit_Framework_TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:01.
 */
class Cradle_I18n_Language_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var Language
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Language(__DIR__.'/../assets/language/tagalog.php');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\I18n\Language::__call
     */
    public function test__call()
    {
        $actual = $this
			->object
			->__call('setGoodBye', ['pa alaam', ' '])
			->__call('getGoodBye', [' ']);
		
		$this->assertEquals('pa alaam', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::get
     */
    public function testGet()
    {
        $string = $this->object->get('How are you?');
		$this->assertEquals('Kumusta ka?', $string);
    }

    /**
     * @covers Cradle\I18n\Language::getLanguage
     */
    public function testGetLanguage()
    {
		$language = $this->object->getLanguage();
		$this->assertArrayHasKey('How are you?', $language);
    }

    /**
     * @covers Cradle\I18n\Language::save
     */
    public function testSave()
    {
		$class = $this
			->object
			->translate('How much is this?', 'Magkano ba ito?')
			->save();
		
		$this->assertInstanceOf('Cradle\I18n\Language', $class);
    }

    /**
     * @covers Cradle\I18n\Language::translate
     */
    public function testTranslate()
    {
		$rand = rand();
		
		$string = $this
			->object
			->translate('How much is this?', 'Magkano ba ito? '.$rand)
			->get('How much is this?');

		$this->assertEquals('Magkano ba ito? '.$rand, $string);
    }

    /**
     * @covers Cradle\I18n\Language::offsetExists
     */
    public function testOffsetExists()
    {
       $actual = isset($this->object['I am fine.']);
	   $this->assertTrue($actual);
    }

    /**
     * @covers Cradle\I18n\Language::offsetGet
     */
    public function testOffsetGet()
    {
        $actual = $this->object['I am fine.'];
	    $this->assertEquals('Mabuti.', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::offsetSet
     */
    public function testOffsetSet()
    {
		$this->object['Up to you'] = 'Bahala ka.';
        $actual = $this->object['Up to you'];
	    $this->assertEquals('Bahala ka.', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::offsetUnset
     */
    public function testOffsetUnset()
    {
		unset($this->object['I am fine.']);
	    $this->assertFalse(isset($this->object['I am fine.']));
    }

    /**
     * @covers Cradle\I18n\Language::current
     */
    public function testCurrent()
    {
        $actual = $this->object->current();
    	$this->assertEquals('Kumusta ka?', $actual);
	}

    /**
     * @covers Cradle\I18n\Language::key
     */
    public function testKey()
    {
        $actual = $this->object->key();
    	$this->assertEquals('How are you?', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::next
     */
    public function testNext()
    {
        $this->object->next();
        $actual = $this->object->current();
    	$this->assertEquals('Mabuti.', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::rewind
     */
    public function testRewind()
    {
        $this->object->rewind();
        $actual = $this->object->current();
    	$this->assertEquals('Kumusta ka?', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::valid
     */
    public function testValid()
    {
        $this->assertTrue($this->object->valid());
    }

    /**
     * @covers Cradle\I18n\Language::__callData
     */
    public function test__callData()
    {
        $actual = $this
			->object
			->__call('setGoodBye', ['pa alaam', ' '])
			->__call('getGoodBye', [' ']);
		
		$this->assertEquals('pa alaam', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::__get
     */
    public function test__get()
    {
        $this->assertEquals('cool', $this->object->__get('astig'));
    }

    /**
     * @covers Cradle\I18n\Language::__getData
     */
    public function test__getData()
    {
        $this->assertEquals('cool', $this->object->__getData('astig'));
    }

    /**
     * @covers Cradle\I18n\Language::__set
     */
    public function test__set()
    {
        $this->object->__set('puede', 'it can');
        $this->assertEquals('it can', $this->object->puede);
    }

    /**
     * @covers Cradle\I18n\Language::__setData
     */
    public function test__setData()
    {
        $this->object->__setData('puede', 'it can');
        $this->assertEquals('it can', $this->object->puede);
    }

    /**
     * @covers Cradle\I18n\Language::__toString
     */
    public function test__toString()
    {
        $actual = $this->object->__toString();
        $this->assertContains('{"How are you?":"Kumusta ka?","I am fine.":"Mabuti.","Where is the market?":"Saan sa palenke?","How much is this?":"Magkano ba ito?', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::__toStringData
     */
    public function test__toStringData()
    {
        $actual = $this->object->__toStringData();
        $this->assertContains('{"How are you?":"Kumusta ka?","I am fine.":"Mabuti.","Where is the market?":"Saan sa palenke?","How much is this?":"Magkano ba ito?', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::generator
     */
    public function testGenerator()
    {
        foreach($this->object->generator() as $en => $tg) {
			$this->assertEquals($tg, $this->object[$en]);
		}
    }

    /**
     * @covers Cradle\I18n\Language::getEventHandler
     */
    public function testGetEventHandler()
    {
		$instance = $this->object->getEventHandler();
		$this->assertInstanceOf('Cradle\Event\EventHandler', $instance);
		
        $instance = $this->object
			->setEventHandler(new LanguageEventHandlerStub)
			->getEventHandler();
		$this->assertInstanceOf('Cradle\I18n\LanguageEventHandlerStub', $instance);
    }

    /**
     * @covers Cradle\I18n\Language::on
     */
    public function testOn()
    {
        $trigger = new StdClass();
		$trigger->success = null;
		
        $callback = function() use ($trigger) {
			$trigger->success = true;
		};
		
		$instance = $this
			->object
			->on('foobar', $callback)
			->trigger('foobar');
		
		$this->assertInstanceOf('Cradle\I18n\Language', $instance);
		$this->assertTrue($trigger->success);
    }

    /**
     * @covers Cradle\I18n\Language::setEventHandler
     */
    public function testSetEventHandler()
    {
        $instance = $this->object->setEventHandler(new LanguageEventHandlerStub);
		$this->assertInstanceOf('Cradle\I18n\Language', $instance);
    }

    /**
     * @covers Cradle\I18n\Language::trigger
     */
    public function testTrigger()
    {
        $trigger = new StdClass();
		$trigger->success = null;
		
        $callback = function() use ($trigger) {
			$trigger->success = true;
		};
		
		$instance = $this
			->object
			->on('foobar', $callback)
			->trigger('foobar');
		
		$this->assertInstanceOf('Cradle\I18n\Language', $instance);
		$this->assertTrue($trigger->success);
    }

    /**
     * @covers Cradle\I18n\Language::i
     */
    public function testI()
    {
        $instance1 = Language::i(array());
		$this->assertInstanceOf('Cradle\I18n\Language', $instance1);
		
		$instance2 = Language::i(array());
		$this->assertTrue($instance1 !== $instance2);
    }

    /**
     * @covers Cradle\I18n\Language::loop
     */
    public function testLoop()
    {
        $self = $this;
        $this->object->loop(function($i) use ($self) {
            $self->assertInstanceOf('Cradle\I18n\Language', $this);
            
            if ($i == 2) {
                return false;
            }
        });
    }

    /**
     * @covers Cradle\I18n\Language::when
     */
    public function testWhen()
    {
        $self = $this;
        $test = 'Good';
        $this->object->when(function() use ($self) {
            $self->assertInstanceOf('Cradle\I18n\Language', $this);
            return false;
        }, function() use ($self, &$test) {
            $self->assertInstanceOf('Cradle\I18n\Language', $this);
            $test = 'Bad';
        });
        
        $this->assertSame('Good', $test);
        
        $test = 'Good';
        $this->object->when(null, function() use (&$test) {
            $test = 'Bad';
        });
        
        $this->assertSame('Good', $test);
        
        $test = 'Good';
        $this->object->when(false, function() use (&$test) {
            $test = 'Bad';
        });
        
        $this->assertSame('Good', $test);
        
        
        $test = 'Good';
        $this->object->when(function() {
            return true;
        }, function() use (&$test) {
            $test = 'Bad';
        });
        
        $this->assertSame('Bad', $test);
        
        $test = 'Good';
        $this->object->when('hi', function() use (&$test) {
            $test = 'Bad';
        });
        
        $this->assertSame('Bad', $test);
        
        $test = 'Good';
        $this->object->when(true, function() use (&$test) {
            $test = 'Bad';
        });
        
        $this->assertSame('Bad', $test);
        
        $test = 'Not Sure';
        $this->object->when(function() use ($self) {
            $self->assertInstanceOf('Cradle\I18n\Language', $this);
            return false;
        }, function() use ($self, &$test) {
            $self->assertInstanceOf('Cradle\I18n\Language', $this);
            $test = 'Good';
        }, function() use ($self, &$test) {
            $self->assertInstanceOf('Cradle\I18n\Language', $this);
            $test = 'Bad';
        });
        
        $this->assertSame('Bad', $test);
    }

    /**
     * @covers Cradle\I18n\Language::getInspectorHandler
     */
    public function testGetInspectorHandler()
    {
        $instance = $this->object->getInspectorHandler();
		$this->assertInstanceOf('Cradle\Profiler\InspectorInterface', $instance);
    }

    /**
     * @covers Cradle\I18n\Language::inspect
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
     * @covers Cradle\I18n\Language::setInspectorHandler
     */
    public function testSetInspectorHandler()
    {
        $instance = $this->object->setInspectorHandler(new InspectorHandlerStub);
		$this->assertInstanceOf('Cradle\I18n\Language', $instance);
    }

    /**
     * @covers Cradle\I18n\Language::addLogger
     */
    public function testAddLogger()
    {
        $instance = $this->object->addLogger(function() {});
		$this->assertInstanceOf('Cradle\I18n\Language', $instance);
    }

    /**
     * @covers Cradle\I18n\Language::log
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
     * @covers Cradle\I18n\Language::loadState
     */
    public function testLoadState()
    {
		$state1 = new Language(array());
		$state2 = new Language(array());
		
		$state1->saveState('state1');
		$state2->saveState('state2');
		
		$this->assertTrue($state2 === $state1->loadState('state2'));
		$this->assertTrue($state1 === $state2->loadState('state1'));
    }

    /**
     * @covers Cradle\I18n\Language::saveState
     */
    public function testSaveState()
    {
        $state1 = new Language(array());
		$state2 = new Language(array());
		
		$state1->saveState('state1');
		$state2->saveState('state2');
		
		$this->assertTrue($state2 === $state1->loadState('state2'));
		$this->assertTrue($state1 === $state2->loadState('state1'));
    }

    /**
     * @covers Cradle\I18n\Language::__callResolver
     */
    public function test__callResolver()
    {
        $actual = $this->object->addResolver(ResolverCallStub::class, function() {});
		$this->assertInstanceOf('Cradle\I18n\Language', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::addResolver
     */
    public function testAddResolver()
    {
        $actual = $this->object->addResolver(ResolverCallStub::class, function() {});
		$this->assertInstanceOf('Cradle\I18n\Language', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::getResolverHandler
     */
    public function testGetResolverHandler()
    {
        $actual = $this->object->getResolverHandler();
		$this->assertInstanceOf('Cradle\Resolver\ResolverInterface', $actual);
    }

    /**
     * @covers Cradle\I18n\Language::resolve
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
     * @covers Cradle\I18n\Language::resolveShared
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
     * @covers Cradle\I18n\Language::resolveStatic
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
     * @covers Cradle\I18n\Language::setResolverHandler
     */
    public function testSetResolverHandler()
    {
        $actual = $this->object->setResolverHandler(new ResolverHandlerStub);
		$this->assertInstanceOf('Cradle\I18n\Language', $actual);
    }
}

if(!class_exists('Cradle\I18n\LanguageEventHandlerStub')) {
	class LanguageEventHandlerStub extends EventHandler
	{
	}
}

if(!class_exists('Cradle\I18n\InspectorHandlerStub')) {
	class InspectorHandlerStub extends InspectorHandler
	{
	}
}

if(!class_exists('Cradle\I18n\ResolverHandlerStub')) {
	class ResolverHandlerStub extends ResolverHandler
	{
	}
}

if(!class_exists('Cradle\I18n\ResolverCallStub')) {
	class ResolverCallStub
	{
		public function foo($string)
		{
			return $string . 'foo';
		}
	}
}

if(!class_exists('Cradle\I18n\ResolverAddStub')) {
	class ResolverAddStub
	{
		public function foo($string)
		{
			return $string . 'foo';
		}
	}
}

if(!class_exists('Cradle\I18n\ResolverSharedStub')) {
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

if(!class_exists('Cradle\I18n\ResolverStaticStub')) {
	class ResolverStaticStub
	{
		public static function foo($string)
		{
			return $string . 'foo';
		}
	}
}