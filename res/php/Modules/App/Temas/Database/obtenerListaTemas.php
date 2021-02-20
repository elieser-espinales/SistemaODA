<?php

namespace ODA\Modules\App\Temas\Database;

use ODA\Modules\App\Temas\TemasEntry;

trait obtenerListaTemas {

    public abstract function Extended();

    public function obtenerListaTemas() {
        $db = $this->Extended()->Database();

        $result = [];
        $db_id = null;
        $db_nombre = null;


        $stmt = $db->prepare("SELECT * FROM temas");
        $stmt->execute();
        $stmt->bind_result($db_id, $db_nombre);
        $stmt->store_result();

        while ($stmt->fetch()) {
            $entry = new TemasEntry();
            $entry
                    ->setId_tema($db_id)
                    ->setNombre_tema($db_nombre);
            $result[] = $entry;
        }

        $stmt->free_result();
        $stmt->close();

        return $result;
    }

}
