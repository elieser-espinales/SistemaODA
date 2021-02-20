<?php

namespace ODA\Application\Web\dispose;

use ODA\Modules\Extended;

trait disposeExtended {

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    private function disposeExtended() {
        $this->disposeDatabase();
    }

    private function disposeDatabase() {
        $Database = $this->getExtended()->Database();
        $Database->close();
    }

}
