<?php

namespace ODA\Modules\App\Temas\Database;

use ODA\Modules\App\Temas\TemasEntry;

trait nuevoTema
{
    public abstract function Extended();

    public function nuevoTema(string $nombre)
    {
        $db = $this->Extended()->Database();
        $stmt = $db->prepare("INSERT INTO temas (nombre_tema) VALUES(?)");
        $stmt->bind_param('s', $nombre);
        $stmt->execute();

        if ($stmt->errno) {
            return new TemasEntry();
        } else {
            $entry = new TemasEntry();
            $entry
                ->setNombre_tema($nombre);


            return $entry;
        }
    }
}
