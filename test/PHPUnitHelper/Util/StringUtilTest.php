<?php
namespace PHPUnitHelper\Util;


class StringUtilTest extends \PHPUnit_Framework_TestCase {

    public function testIndent()
    {
        $data = "abc\ndef\n";
        $expected = "    abc\n    def\n";
        $this->assertEquals($expected, StringUtil::indent($data, 4));
    }

}
