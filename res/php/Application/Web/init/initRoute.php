<?php

namespace ODA\Application\Web\init;

use ODA\Application\Web\WebRoute;
use ODA\Modules\Extended;
use ODA\Pages;

trait initRoute {

    /**
     *
     * @var WebRoute
     */
    private $Route;

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    private function initRoute() {
        $Route = new WebRoute('p', Pages\Home::class, $this->getExtended());
        $Ex = $Route->Extended();

        $Route
                ->addRoute(new WebRoute('home', Pages\Home::class, $Ex))
                ->addRoute(new WebRoute('temas', Pages\Temas::class, $Ex))
                ->addRoute(new WebRoute('test', Pages\Test::class, $Ex));

        $this->Route = $Route->init();
    }

}
