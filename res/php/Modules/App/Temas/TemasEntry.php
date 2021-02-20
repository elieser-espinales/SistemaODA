<?php

namespace ODA\Modules\App\Temas;

class TemasEntry
{
          private $id_tema = 0;
          private $nombre_tema  = "No definido";

          /**
           * Get the value of id_tamas
           */
          public function getId_tema()
          {
                    return $this->id_tema;
          }

          /**
           * Set the value of id_tamas
           *
           * @return  self
           */
          public function setId_tema($id_tema)
          {
                    $this->id_tema = $id_tema;

                    return $this;
          }

          /**
           * Get the value of nombre_tema
           */
          public function getNombre_tema()
          {
                    return $this->nombre_tema;
          }

          /**
           * Set the value of nombre_tema
           *
           * @return  self
           */
          public function setNombre_tema($nombre_tema)
          {
                    $this->nombre_tema = $nombre_tema;

                    return $this;
          }
}
