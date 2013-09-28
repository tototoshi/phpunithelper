<?php
namespace PHPUnitHelper\Util;

class StringUtil
{

    public static function indent($data, $indent)
    {
        $whitespaces = '';
        for ($i = 0; $i < $indent; $i++) {
            $whitespaces .= ' ';
        }
        $data = rtrim($data);
        $lines = explode("\n", $data);
        $buf = '';
        foreach ($lines as $line) {
            if ($line === '') {
                $buf .= "\n";
            } else {
                $buf .= $whitespaces . $line . "\n";
            }
        }
        return $buf;
    }

}