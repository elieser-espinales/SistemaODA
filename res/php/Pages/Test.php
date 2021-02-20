<?php

namespace ODA\Pages;

use ODA\Modules\Extended;
use ODA\Modules\WebPage\Page;
use ODA\Modules\App\Prueba;

/**
 * 
 */
class Test extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Test", "pages/test.twig");
    }

    public function initVars() {
        $this->setVar('page.title', 'Test Page');

        $db = new Prueba($this->Extended());
        $db->nuevaPrueba(1, "foo");

        $data = $db->obtenerPrueba(1);

        $this->setVar('prueba.dato', $data);

        $db->borrarPrueba(1);

        $db->nuevaPrueba(1, "foo");
        $db->nuevaPrueba(2, "bar");

        $lista = $db->obtenerListaDePrueba();
        $this->setVar('prueba.lista', $lista);

        $db->borrarPrueba(1);
        $db->borrarPrueba(2);
    }

}
