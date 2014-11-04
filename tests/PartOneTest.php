<?php
require_once('/src/CountryCodes.php');

/**
 * Class PartOneTest
 */
class PartOneTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException Exception
     */
    public function testStringMap()
    {
        $hello = new CountryCodes();
        $hello->addMap('wrong type');
    }

    /**
     * @expectedException Exception
     */
    public function testEmptyArrayMap()
    {
        $hello = new CountryCodes();
        $hello->addMap([]);
    }

    /**
     * @expectedException Exception
     */
    public function testWrongArrayFormat()
    {
        $hello = new CountryCodes();
        $hello->addMap(['explicit', 'keys', 'missing']);
    }

    /**
     * @expectedException Exception
     */
    public function testDeepArrayMap()
    {
        $hello = new CountryCodes();
        $hello->addMap(['this' => ['array' => ['is' => ['too' => ['deep']]]]]);
    }

    /**
     * @throws Exception
     */
    public function testSwap1()
    {
        $this->expectOutputString('CODE' . "\n");

        $hello = new CountryCodes();
        $hello->addCode('CODE')->sort()->addMap([
            'X' => 'SWAP'
        ])->run();
    }

    /**
     * @throws Exception
     */
    public function testSwap2()
    {
        $this->expectOutputString('CODE' . "\n");

        $hello = new CountryCodes();
        $hello->addCode('CODE')->sort()->addMap([
            'CODEX' => 'SWAP'
        ])->run();
    }

    /**
     * @throws Exception
     */
    public function testSwap3()
    {
        $this->expectOutputString('SWAP' . "\n");

        $hello = new CountryCodes();
        $hello->addCode('CODE')->sort()->addMap([
            'C' => 'SWAP'
        ])->run();
    }

    /**
     * @throws Exception
     */
    public function testSwap4()
    {
        $this->expectOutputString('SWAP' . "\n");

        $hello = new CountryCodes();
        $hello->addCode('CODE')->sort()->addMap([
            'C' => 'SWAP',
            'O' => 'SWAP2'
        ])->run();
    }

}