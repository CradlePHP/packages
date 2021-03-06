<?php

namespace Cradle\Sql\PostGreSql;

use PHPUnit_Framework_TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-30 at 04:38:38.
 */
class Cradle_Sql_PostGreSql_QueryInsert_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var QueryInsert
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new QueryInsert;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Sql\PostGreSql\QueryInsert::getQuery
     */
    public function testGetQuery()
    {
        $actual = $this->object->getQuery();
		$this->assertEquals('INSERT INTO "" ("") VALUES ;', $actual);
    }

    /**
     * @covers Cradle\Sql\PostGreSql\QueryInsert::set
     */
    public function testSet()
    {
        $instance = $this->object->set('foo', 'bar');
		$this->assertInstanceOf('Cradle\Sql\PostGreSql\QueryInsert', $instance);
    }
}
