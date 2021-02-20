<?php

namespace ODA\Application\Web\init;

use ODA\Modules\Extended;
use ODA\Modules\Extended\Database;

trait initExtended {

    /**
     *
     * @var Extended
     */
    private $Extended;

    private function initExtended() {
        $Database = $this->initDatabase();

        $Extented = new Extended($Database);

        $this->Extended = $Extented;
    }

    private function initDatabase() {
        $Database = new Database();

        return $Database;
    }

}
