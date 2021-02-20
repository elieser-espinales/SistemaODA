<?php

namespace ODA\Modules\App\Prueba;

class PruebaEntry {

    private $valor_n;
    private $valor_s;

    public function getValor_n() {
        return $this->valor_n;
    }

    public function getValor_s() {
        return $this->valor_s;
    }

    public function setValor_n(int $valor_n) {
        $this->valor_n = $valor_n;
        return $this;
    }

    public function setValor_s(string $valor_s) {
        $this->valor_s = $valor_s;
        return $this;
    }

}
