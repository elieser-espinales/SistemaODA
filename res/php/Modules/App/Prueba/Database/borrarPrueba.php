<?php

namespace ODA\Modules\App\Prueba\Database;

trait borrarPrueba {

    public abstract function Extended();

    public function borrarPrueba(int $valor_n) {
        $db = $this->Extended()->Database();

        $stmt = $db->prepare("DELETE FROM tabla_de_prueba WHERE valor_n = ?");
        $stmt->bind_param('i', $valor_n);
        $stmt->execute();
    }

}
