<?php

namespace ODA\Modules\Extended;

use ODA\Modules\Extended;

abstract class ExtendedExtended {

    /**
     *
     * @var Extended
     */
    protected $Extended;

    /**
     * 
     * @return Extended
     */
    public function Extended() {
        return $this->Extended;
    }

    /**
     * 
     * @param Extended $Extended
     * @param Basics $Basics
     */
    public function __construct(Extended $Extended = NULL) {
        $this->Extended = ($Extended) ? : new Extended();
    }

}
