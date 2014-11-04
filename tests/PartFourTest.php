<?php
require_once('/src/Lis.php');

/**
 * Class PartFourTest
 */
class PartFourTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException Exception
     */
    public function testLisInput1()
    {
        $hello = new Lis();
        $hello->run('wrong type');
    }

    /**
     * @expectedException Exception
     */
    public function testLisInput2()
    {
        $hello = new Lis();
        $hello->run([]);
    }


    /**
     * @throws Exception
     */
    public function testLis1()
    {
        $hello = new Lis();
        $this->assertEquals([10, 22, 33, 50, 60, 90], $hello->run([10, 22, 9, 33, 21, 50, 41, 60, 90]));
    }


    /**
     * @throws Exception
     */
    public function testLis2()
    {
        $hello = new Lis();
        $this->assertEquals([0, 7, 8, 12, 14, 15], $hello->run([0, 7, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15]));
    }


    /**
     * @throws Exception
     */
    public function testLis3()
    {
        $hello = new Lis();
        $this->assertEquals([3, 4, 5], $hello->run([3, 2, 6, 4, 5, 1]));
    }
}