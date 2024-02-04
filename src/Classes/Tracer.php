<?php

namespace App\Classes;

class Tracer
{

    static public function trace(array $data = [])
    {
        echo ('<pre>');
        var_dump($data);
        echo ('</pre>');
    }

    static public function traceAndExit(array $data = [])
    {
        self::trace($data);

        exit();
    }
}
