<?php 

namespace Cradle\Sql;

use PHPUnit_Framework_TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:02.
 */
class Cradle_Sql_PostGreSql_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var PostGreSql
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = SqlFactory::load(include(__DIR__.'/../assets/sql/pgsql.php'));
		$schema = file_get_contents(__DIR__.'/../assets/sql/pgsql-schema.sql');
		$this->object->query($schema);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Sql\PostGreSql::connect
     */
    public function testConnect()
    {
		$instance = $this->object->connect(include(__DIR__.'/../assets/sql/pgsql.php'));
		$this->assertInstanceOf('Cradle\Sql\PostGreSql', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getAlterQuery
     */
    public function testGetAlterQuery()
    {
		$instance = $this->object->getAlterQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QueryAlter', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getColumns
     */
    public function testGetColumns()
    {
		$actual = $this->object->getColumns('address');
		$this->assertTrue(is_array($actual));
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getCreateQuery
     */
    public function testGetCreateQuery()
    {
		$instance = $this->object->getCreateQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QueryCreate', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getDeleteQuery
     */
    public function testGetDeleteQuery()
    {
		$instance = $this->object->getDeleteQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QueryDelete', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getIndexes
     */
    public function testGetIndexes()
    {
		$actual = $this->object->getIndexes('address');
		$this->assertTrue(is_array($actual));
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getInsertQuery
     */
    public function testGetInsertQuery()
    {
		$instance = $this->object->getInsertQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QueryInsert', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getPrimary
     */
    public function testGetPrimary()
    {
		$actual = $this->object->getPrimary('address');
		$this->assertTrue(is_array($actual));
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getSelectQuery
     */
    public function testGetSelectQuery()
    {
		$instance = $this->object->getSelectQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QuerySelect', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getTables
     */
    public function testGetTables()
    {
        $actual = $this->object->getTables();
		$this->assertEquals('address', $actual[0]['tablename']);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getUpdateQuery
     */
    public function testGetUpdateQuery()
    {
		$instance = $this->object->getUpdateQuery('foobar');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QueryUpdate', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::setSchema
     */
    public function testSetSchema()
    {
		$instance = $this->object->setSchema('testing_db');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql', $instance);
    }

    /**
     * @covers Cradle\Sql\PostGreSql::getUtilityQuery
     */
    public function testGetUtilityQuery()
    {
		$instance = $this->object->getUtilityQuery();
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QueryUtility', $instance);
    }
}
