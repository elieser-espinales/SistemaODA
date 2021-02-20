<?php

namespace ODA\Modules\App\Prueba\Database;

use ODA\Modules\App\Prueba\PruebaEntry;

trait obtenerListaDePrueba {

    public abstract function Extended();

    public function obtenerListaDePrueba() {
        $db = $this->Extended()->Database();

        $result = [];

        $stmt = $db->prepare("SELECT valor_n, valor_s FROM tabla_de_prueba");
        $stmt->execute();
        $stmt->bind_result($dbvalor_n, $dbvalor_s);
        $stmt->store_result();

        while ($stmt->fetch()) {
            $entry = new PruebaEntry();
            $entry
                    ->setValor_n($dbvalor_n)
                    ->setValor_s($dbvalor_s);
            $result[] = $entry;
        }

        $stmt->free_result();
        $stmt->close();

        return $result;
    }

}
