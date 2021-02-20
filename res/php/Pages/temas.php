<?php

namespace ODA\Pages;

use ODA\Modules\Extended;
use ODA\Modules\WebPage\Page;

use ODA\Modules\App;


class Temas extends Page
{


    private $TemasController;
    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL)
    {
        parent::__construct($Extended, "Temas", "pages/Temas.twig");
    }

    public function initVars()
    {
        $db = $this->TemasController;
        $ListaTemas = $db->obtenerListaTemas();
        $this->setVar('page.title', 'LISTA  DE TEMAS');
        $this->setVar('listaTemas', $ListaTemas);
    }

    public function setUp()
    {
        $this->TemasController = new App\Temas($this->Extended());
    }

    public function CheckPost()
    {
        $nombreTema = $this->getPost('nombreTema');
        $db = $this->TemasController;
        //var_dump($nombreTema);
        $db->nuevoTema($nombreTema);
    }
}
