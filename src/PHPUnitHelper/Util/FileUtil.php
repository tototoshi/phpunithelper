<?php
namespace PHPUnitHelper\Util;


class FileUtil {

    public static function join()
    {
        $args = func_get_args();
        $path = '';
        foreach ($args as $arg) {
            if ($path !== '') {
                $path .= '/';
            }
            $path .= rtrim($arg, '/');
        }
        return $path;
    }

    public static function ensureDirectoryExists($directory)
    {
        if (!file_exists($directory)) {
            $recursive = true;
            mkdir($directory, 0755, $recursive);
        }
    }

}