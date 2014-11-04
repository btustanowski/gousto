<?php
require_once('/src/WordSwap.php');

/**
 * Class PartTwoTest
 */
class PartTwoTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException Exception
     */
    public function testInput1()
    {
        $hello = new WordSwap();
        $hello->run('');
    }

    /**
     * @expectedException Exception
     */
    public function testInput2()
    {
        $hello = new WordSwap();
        $hello->run(['here\'s an array']);
    }

    /**
     * @expectedException Exception
     */
    public function testInput3()
    {
        $hello = new WordSwap();
        $hello->run('        ');
    }

    /**
     * @throws Exception
     */
    public function testReverse1()
    {
        // A Finnish palindrome.
        $this->expectOutputString('saippuakivikauppias');

        $hello = new WordSwap();

        $hello->run('saippuakivikauppias');
    }

    /**
     * @throws Exception
     */
    public function testReverse2()
    {
        $this->expectOutputString('olleh dlrow');

        $hello = new WordSwap();

        $hello->run('hello world');
    }

    /**
     * @throws Exception
     */
    public function testReverse3()
    {
        $this->expectOutputString('ABBA saw a hsidewS pop puorg demrof ni mlohkcotS ni .2791');

        $hello = new WordSwap();

        $hello->run('ABBA was a Swedish pop group formed in Stockholm in 1972.');
    }

}