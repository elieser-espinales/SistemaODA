<?php

namespace ODA\Modules\App\Prueba\Database;

use ODA\Modules\App\Prueba\PruebaEntry;

trait nuevaPrueba {

    public abstract function Extended();

    public function nuevaPrueba(int $valor_n, string $valor_s): PruebaEntry {
        $db = $this->Extended()->Database();

        $stmt = $db->prepare("INSERT INTO tabla_de_prueba (valor_n, valor_s) VALUES(?, ?)");
        $stmt->bind_param('is', $valor_n, $valor_s);
        $stmt->execute();

        if ($stmt->errno) {
            return new PruebaEntry();
        } else {
            $entry = new PruebaEntry();
            $entry
                    ->setValor_n($valor_n)
                    ->setValor_s($valor_s);

            return $entry;
        }
    }

}
