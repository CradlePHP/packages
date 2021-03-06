<?php 

namespace Cradle\Sql;

use PDO;
use PHPUnit_Framework_TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:02.
 */
class Cradle_Sql_Sqlite_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var Sqlite
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
		$connection = include(__DIR__.'/../assets/sql/sqlite.php');
        $this->object = SqlFactory::load($connection);
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Sql\Sqlite::connect
     */
    public function testConnect()
    {
		$instance = $this->object->connect(include(__DIR__.'/../assets/sql/sqlite.php'));
		
		$this->assertInstanceOf('Cradle\Sql\Sqlite', $instance);
    }

    /**
     * @covers Cradle\Sql\Sqlite::getAlterQuery
     */
    public function testGetAlterQuery()
    {
		$instance = $this->object->getAlterQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\Sqlite\QueryAlter', $instance);
    }

    /**
     * @covers Cradle\Sql\Sqlite::getColumns
     */
    public function testGetColumns()
    {
		$actual = $this->object->getColumns('unit_post');
		$this->assertTrue(is_array($actual));
    }

    /**
     * @covers Cradle\Sql\Sqlite::getCreateQuery
     */
    public function testGetCreateQuery()
    {
		$instance = $this->object->getCreateQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\Sqlite\QueryCreate', $instance);
    }

    /**
     * @covers Cradle\Sql\Sqlite::getPrimaryKey
     */
    public function testGetPrimaryKey()
    {
		$actual = $this->object->getPrimaryKey('unit_post');
		$this->assertEquals('post_id', $actual);
    }

    /**
     * @covers Cradle\Sql\Sqlite::getTables
     */
    public function testGetTables()
    {
        $actual = $this->object->getTables();
		$this->assertEquals('unit_post', $actual[0]['name']);
    }

    /**
     * @covers Cradle\Sql\Sqlite::insertRows
     */
    public function testInsertRows()
    {
        $instance = $this->object->insertRows('unit_post', array(
			array(
				'post_slug'			=> 'unit-test-2-'.md5(uniqid()),
				'post_title' 		=> 'Unit Test 2',
				'post_detail' 		=> 'Unit Test Detail 2',
				'post_published' 	=> date('Y-m-d'),
				'post_created' 		=> date('Y-m-d H:i:s'),
				'post_updated' 		=> date('Y-m-d H:i:s')),
			array(
				'post_slug'			=> 'unit-test-3-'.md5(uniqid()),
				'post_title' 		=> 'Unit Test 3',
				'post_detail' 		=> 'Unit Test Detail 3',
				'post_published' 	=> date('Y-m-d'),
				'post_created' 		=> date('Y-m-d H:i:s'),
				'post_updated' 		=> date('Y-m-d H:i:s'))
		));

		$this->assertInstanceOf('Cradle\Sql\Sqlite', $instance);
    }

    /**
     * @covers Cradle\Sql\Sqlite::getSelectQuery
     */
    public function testGetSelectQuery()
    {
		$instance = $this->object->getSelectQuery();
		$this->assertInstanceOf('Cradle\Sql\QuerySelect', $instance);
	}

    /**
     * @covers Cradle\Sql\Sqlite::getUtilityQuery
     */
    public function testGetUtilityQuery()
    {
		$instance = $this->object->getUtilityQuery();
		$this->assertInstanceOf('Cradle\Sql\Sqlite\QueryUtility', $instance);
    }
}
