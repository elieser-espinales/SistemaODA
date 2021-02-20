<?php

namespace ODA\Modules;

use ODA\Modules\Extended\Database;

class Extended {

    private $Database;

    public function __construct(Database $Database = NULL) {
        $this->Database = ($Database) ?: new Database();
    }

    /**
     * 
     * @return Database
     */
    public function Database() {
        return $this->Database;
    }

}
