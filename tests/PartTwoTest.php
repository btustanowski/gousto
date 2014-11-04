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

    public function testReverse1()
    {
        $this->expectOutputString('saippuakivikauppias');

        $hello = new WordSwap();

        // A Finnish palindrome.
        $hello->run('saippuakivikauppias');
    }

    public function testReverse2()
    {
        $this->expectOutputString('olleh dlrow');

        $hello = new WordSwap();

        // A Finnish palindrome.
        $hello->run('hello world');
    }

    public function testReverse3()
    {
        $this->expectOutputString('ABBA saw a hsidewS pop puorg demrof ni mlohkcotS ni .2791');

        $hello = new WordSwap();

        // A Finnish palindrome.
        $hello->run('ABBA was a Swedish pop group formed in Stockholm in 1972.');
    }

}