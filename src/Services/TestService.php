<?php

namespace App\Services;

use phpDocumentor\Reflection\Types\Integer;

class TestService {
    private $kurs = 60;

    public function convert($rub) {
        return $rub/$this->kurs;
    }
}