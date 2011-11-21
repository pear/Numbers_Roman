<?php
// Call Numbers_RomanTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "Numbers_RomanTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

//make cvs testing work
chdir(dirname(__FILE__) . '/../');
require_once 'Numbers/Roman.php';

/**
 * Test class for Numbers_Roman.
 * Generated by PHPUnit_Util_Skeleton on 2007-06-28 at 11:41:09.
 */
class Numbers_RomanTest extends PHPUnit_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("Numbers_RomanTest");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * @todo Use a dataprovider?
     */
    public function testToNumber() {
        $this->assertEquals(   1, Numbers_Roman::toNumber('I'));
        $this->assertEquals(   1, Numbers_Roman::toNumber('i'));
        $this->assertEquals(   2, Numbers_Roman::toNumber('II'));
        $this->assertEquals(   3, Numbers_Roman::toNumber('III'));
        $this->assertEquals(   4, Numbers_Roman::toNumber('IV'));
        $this->assertEquals(   5, Numbers_Roman::toNumber('V'));
        $this->assertEquals(   6, Numbers_Roman::toNumber('VI'));
        $this->assertEquals(   7, Numbers_Roman::toNumber('VII'));
        $this->assertEquals(   8, Numbers_Roman::toNumber('VIII'));
        $this->assertEquals(   9, Numbers_Roman::toNumber('IX'));
        $this->assertEquals(  10, Numbers_Roman::toNumber('X'));
        $this->assertEquals(  20, Numbers_Roman::toNumber('XX'));
        $this->assertEquals(  23, Numbers_Roman::toNumber('XXIII'));
        $this->assertEquals(  30, Numbers_Roman::toNumber('XXX'));
        $this->assertEquals(  40, Numbers_Roman::toNumber('XL'));
        $this->assertEquals(  50, Numbers_Roman::toNumber('L'));
        $this->assertEquals( 100, Numbers_Roman::toNumber('C'));
        $this->assertEquals( 111, Numbers_Roman::toNumber('CXI'));
        $this->assertEquals( 150, Numbers_Roman::toNumber('CL'));
        $this->assertEquals( 200, Numbers_Roman::toNumber('CC'));
        $this->assertEquals( 500, Numbers_Roman::toNumber('D'));
        $this->assertEquals(1000, Numbers_Roman::toNumber('M'));
        $this->assertEquals(2000, Numbers_Roman::toNumber('MM'));
        $this->assertEquals(3999, Numbers_Roman::toNumber('MMMCMXCIX'));

        $this->assertEquals(    5000, Numbers_Roman::toNumber('_V'));//S
        $this->assertEquals(   10000, Numbers_Roman::toNumber('_X'));//R
        $this->assertEquals(   50000, Numbers_Roman::toNumber('_L'));//P
        $this->assertEquals(  100000, Numbers_Roman::toNumber('_C'));//Q
        $this->assertEquals(  500000, Numbers_Roman::toNumber('_D'));//O
        $this->assertEquals( 1000000, Numbers_Roman::toNumber('_M'));//N
        $this->assertEquals(       0, Numbers_Roman::toNumber('0'));//0

        $this->assertEquals(    6666, Numbers_Roman::toNumber('_VMDCLXVI'));


        //special cases
        $this->assertEquals(   4, Numbers_Roman::toNumber('IIII'));
        $this->assertEquals(  10, Numbers_Roman::toNumber('VV'));

        $this->assertEquals(  99, Numbers_Roman::toNumber('XCIX'));
        $this->assertEquals(  99, Numbers_Roman::toNumber('IC'));

        $this->assertEquals(1910, Numbers_Roman::toNumber('MDCCCCX'));
        $this->assertEquals(1910, Numbers_Roman::toNumber('MCMX'));
        $this->assertEquals(1904, Numbers_Roman::toNumber('MDCCCCIIII'));

        //error handling
        $nReporting = error_reporting();
        error_reporting($nReporting ^ E_USER_NOTICE);
        $this->assertEquals( 9  , Numbers_Roman::toNumber('IIX'));
        //restore old value
        error_reporting($nReporting);
    }

    /**
     *
     */
    public function testToRoman() {
        //alias of toNumeral
        $this->assertEquals(Numbers_Roman::toRoman(1), Numbers_Roman::toNumeral(1));
        $this->assertEquals(Numbers_Roman::toRoman(2), Numbers_Roman::toNumeral(2));
        $this->assertEquals(Numbers_Roman::toRoman(5), Numbers_Roman::toNumeral(5));
    }

    /**
     *
     */
    public function testToNumeral() {
        $this->assertEquals('I',       Numbers_Roman::toNumeral(1));
        $this->assertEquals('i',       Numbers_Roman::toNumeral(1, false));
        $this->assertEquals('II',      Numbers_Roman::toNumeral(2));
        $this->assertEquals('III',     Numbers_Roman::toNumeral(3));
        $this->assertEquals('IV',      Numbers_Roman::toNumeral(4));
        $this->assertEquals('V',       Numbers_Roman::toNumeral(5));
        $this->assertEquals('VI',      Numbers_Roman::toNumeral(6));
        $this->assertEquals('VII',     Numbers_Roman::toNumeral(7));
        $this->assertEquals('VIII',    Numbers_Roman::toNumeral(8));
        $this->assertEquals('IX',      Numbers_Roman::toNumeral(9));
        $this->assertEquals('X',       Numbers_Roman::toNumeral(10));
        $this->assertEquals('XX',      Numbers_Roman::toNumeral(20));
        $this->assertEquals('XXX',     Numbers_Roman::toNumeral(30));
        $this->assertEquals('XL',      Numbers_Roman::toNumeral(40));
        $this->assertEquals('L',       Numbers_Roman::toNumeral(50));
        $this->assertEquals('C',       Numbers_Roman::toNumeral(100));
        $this->assertEquals('CC',      Numbers_Roman::toNumeral(200));
        $this->assertEquals('D',       Numbers_Roman::toNumeral(500));
        $this->assertEquals('M',       Numbers_Roman::toNumeral(1000));
        $this->assertEquals('MM',      Numbers_Roman::toNumeral(2000));

        $this->assertEquals('_V',      Numbers_Roman::toNumeral(5000, true, false));
        $this->assertEquals('_X',      Numbers_Roman::toNumeral(10000, true, false));
        $this->assertEquals('_L',      Numbers_Roman::toNumeral(50000, true, false));
        $this->assertEquals('_C',      Numbers_Roman::toNumeral(100000, true, false));
        $this->assertEquals('_D',      Numbers_Roman::toNumeral(500000, true, false));
        $this->assertEquals('_M',      Numbers_Roman::toNumeral(1000000, true, false));

        $this->assertEquals('_VMDCLXVI', Numbers_Roman::toNumeral(6666, true, false));

        $this->assertEquals('',      Numbers_Roman::toNumeral(-1));
    }



    public function testEquality()
    {
        for ($a = 0; $a <= 1000; $a++) {
            $this->assertEquals(
                $a,
                Numbers_Roman::toNumber(
                    Numbers_Roman::toNumeral($a, true, false)
                )
            );
        }
    }//public function testEquality()
}

// Call Numbers_RomanTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "Numbers_RomanTest::main") {
    Numbers_RomanTest::main();
}
?>
