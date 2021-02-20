<?php

namespace ODA\Pages;

use ODA\Modules\Extended;
use ODA\Modules\WebPage\Page;

/**
 * 
 */
class Home extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Home");
    }

    public function initVars() {
        $this->setVar('page.title', 'Pagina de inicio');
    }

}
