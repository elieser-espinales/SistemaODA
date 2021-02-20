<?php

namespace ODA\Application\Web\init;

use ODA\Application\Web\WebRoute;
use ODA\Util\Functions;
use ODA\Modules\Extended;

trait initDisplay {

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    private function initDisplay() {
        $Page = $this->getRoute()->getPage();

        if ($Page) {
            $Twig = $Page->getTwig();

            $Twig->setVars([
                'page.title' => Functions::strFormat("%config_title | %config_var", array(
                    'config_title' => 'ODA',
                    'config_var' => $Twig->getVar('page.title')
                )),
                'debug.executiontime' => ( microtime(true) - $this->ExecutionTime ),
            ]);
            echo $Page->display();
        } else {
            echo "No pageclass found.";
        }
    }

}
