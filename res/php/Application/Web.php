<?php

namespace ODA\Application;

use ODA\Application\Web\init;
use ODA\Application\Web\dispose;
use ODA\Application\Web\WebRoute;
use ODA\Modules\Extended;

class Web {

    use init\initRoute,
        init\initDisplay,
        init\initExtended,
        dispose\disposeExtended;

    /**
     * @var float Guarda el tiempo de ejecución en milisegundos
     */
    private $ExecutionTime = 0;

    /**
     *
     * @var Extended
     */
    private $Extended;

    /**
     *
     * @var WebRoute
     */
    private $Route;

    /**
     * 
     * @return \ODA\Application\Web
     */
    public function app() {
        $this->ExecutionTime = microtime(true);

        $this->initExtended();
        $this->initRoute();

        $this->disposeExtended();

        $this->initDisplay();
        return $this;
    }

    /**
     * 
     * @return WebRoute
     */
    public function getRoute() {
        return $this->Route;
    }


    /**
     * 
     * @return Extended
     */
    public function getExtended() {
        return $this->Extended;
    }

}
