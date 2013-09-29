<?php
namespace PHPUnitHelper\Util;

class FileUtilTest extends \PHPUnit_Framework_TestCase
{

    public function testJoin()
    {
        $expected = "/foo/bar/baz";
        $actual = FileUtil::join("/foo/", "bar", "baz");
        $this->assertEquals($expected, $actual);
    }

    public function testEnsureDirectoryExists()
    {
        $testDirParent = FileUtil::join(
            '/tmp',
            StringUtil::randomMD5String()
        );

        $testDir = FileUtil::join(
            $testDirParent,
            StringUtil::randomMD5String()
        );

        FileUtil::ensureDirectoryExists($testDir);

        $this->assertTrue(file_exists($testDir));

        rmdir($testDir);
        rmdir($testDirParent);
    }
}
