<?php

namespace ODA\Modules\App;

use ODA\Modules\App\Prueba\Database;
use ODA\Modules\Extended;
use ODA\Modules\Extended\ExtendedExtended;

class Prueba extends ExtendedExtended {

    use Database\nuevaPrueba,
        Database\borrarPrueba,
        Database\obtenerPrueba,
        Database\obtenerListaDePrueba;

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);
    }

}
