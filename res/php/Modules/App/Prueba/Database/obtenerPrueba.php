<?php

namespace ODA\Modules\App\Prueba\Database;

use ODA\Modules\App\Prueba\PruebaEntry;

trait obtenerPrueba {

    public abstract function Extended();

    public function obtenerPrueba(int $valor_n): PruebaEntry {
        $db = $this->Extended()->Database();

        $result = new PruebaEntry();

        $stmt = $db->prepare("SELECT valor_n, valor_s FROM tabla_de_prueba WHERE valor_n = ?");
        $stmt->bind_param('i', $valor_n);
        $stmt->execute();
        $stmt->bind_result($dbvalor_n, $dbvalor_s);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        $result
                ->setValor_n($dbvalor_n)
                ->setValor_s($dbvalor_s);

        return $result;
    }

}
