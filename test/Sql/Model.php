<?php 

namespace Cradle\Sql;

use PHPUnit_Framework_TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:02.
 */
class Cradle_Sql_Model_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var Model
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Model();
		$this->object
			->setDatabase(new AbstractSqlStub)
			->setFoobarTitle('Foo Bar 1')
			->setFoobarDate('January 12, 2015')
			->setFooDate(1234567890);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Sql\Model::formatTime
     */
    public function testFormatTime()
    {
		$actual = $this->object->formatTime('foobar_date');
		$this->assertEquals('2015-01-12 12:00:00', $actual->getFoobarDate());
		$actual = $this->object->formatTime('foo_date');
		$this->assertEquals('2009-02-13 11:31:30', $actual->getFooDate());
		$actual = $this->object->formatTime('foo_title');
		$this->assertEquals('Foo Bar 1', $actual->getFoobarTitle());
    }

    /**
     * @covers Cradle\Sql\Model::insert
	 * @covers Cradle\Sql\Model::getMeta
	 * @covers Cradle\Sql\Model::getValidColumns
     */
    public function testInsert()
    {
		$instance = $this->object->insert('foo');
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
		$this->assertEquals(123, $this->object->getFoobarId());
		
		$instance = $this->object->setTable('foo')->insert();
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
		$this->assertEquals(123, $this->object->getFoobarId());
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->insert();
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->insert('foo');
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->insert('foo', new AbstractSqlStub);
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertFalse($triggered);
    }

    /**
     * @covers Cradle\Sql\Model::remove
	 * @covers Cradle\Sql\Model::getMeta
	 * @covers Cradle\Sql\Model::getValidColumns
     */
    public function testRemove()
    {
		$instance = $this->object->setFoobarId(321)->remove('foo');
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
		
		$instance = $this->object->setFoobarId(321)->setTable('foo')->remove();
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarId(321)
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->remove();
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarId(321)
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->remove('foo');
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarId(321)
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->remove('foo', new AbstractSqlStub, 'foobar_id');
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertFalse($triggered);
    }

    /**
     * @covers Cradle\Sql\Model::save
	 * @covers Cradle\Sql\Model::isPrimarySet
     */
    public function testSave()
    {
		$instance = $this->object->save('foo');
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
		
		$instance = $this->object->setTable('foo')->save();
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->save();
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->save('foo');
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarId(321)
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->save('foo', new AbstractSqlStub, 'foobar_id');
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertFalse($triggered);
    }

    /**
     * @covers Cradle\Sql\Model::setDatabase
     */
    public function testSetDatabase()
    {
        $instance = $this->object->setDatabase(new AbstractSqlStub);
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
    }

    /**
     * @covers Cradle\Sql\Model::setTable
     */
    public function testSetTable()
    {
		$instance = $this->object->setTable('foo');
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
    }

    /**
     * @covers Cradle\Sql\Model::update
	 * @covers Cradle\Sql\Model::getMeta
	 * @covers Cradle\Sql\Model::getValidColumns
     */
    public function testUpdate()
    {
		$instance = $this->object->setFoobarId(321)->update('foo');
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
	
		$instance = $this->object->setFoobarId(321)->setTable('foo')->update();
		$this->assertInstanceOf('Cradle\Sql\Model', $instance);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->update();
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->update('foo');
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertTrue($triggered);
		
		$triggered = false;
		try {	
			$this->object = new Model();
			$this->object
				->setFoobarId(321)
				->setFoobarTitle('Foo Bar 1')
				->setFoobarDate('January 12, 2015')
				->setFooDate(1234567890)
				->update('foo', new AbstractSqlStub, 'foobar_id');
		} catch(SqlException $e) {
			$triggered = true;
		}
		
		$this->assertFalse($triggered);
    }
}

if(!class_exists('Cradle\Sql\AbstractSqlStub')) {
	class AbstractSqlStub extends AbstractSql implements SqlInterface
	{
		public function connect($options = [])
		{
			$this->connection = 'foobar';
			return $this;
		}
		
		public function getLastInsertedId($column = null)
		{
			return 123;
		}
		
		public function query($query, array $binds = [])
    	{
			return array(array(
				'total' => 123,
				'query' => (string) $query, 
				'binds' => $binds
			));
		}
		
		public function getColumns()
		{
			return array(
				array(
					'Field' => 'foobar_id',
					'Type' => 'int',
					'Key' => 'PRI',
					'Default' => null,
					'Null' => 1
				),
				array(
					'Field' => 'foobar_title',
					'Type' => 'vachar',
					'Key' => null,
					'Default' => null,
					'Null' => 1
				),
				array(
					'Field' => 'foobar_date',
					'Type' => 'datetime',
					'Key' => null,
					'Default' => null,
					'Null' => 1
				)
			);
		}
	}
}
