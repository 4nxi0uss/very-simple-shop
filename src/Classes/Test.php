<?php

namespace App\Classes;

class Test
{

    public function textTest(string $data = ''): void
    {
        echo ('<pre>');
        echo ($data);
        echo ('</pre>');
    }
}
