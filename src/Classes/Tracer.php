<?php

namespace App\Classes;

class Tracer {

    public function tracer(array $data = []) {
        echo('<pre>');
        var_dump($data);
        echo('</pre>');
    }
    

}
