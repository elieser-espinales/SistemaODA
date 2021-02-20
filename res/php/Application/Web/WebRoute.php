<?php

namespace ODA\Application\Web;

use ODA\Pages;
use ODA\Modules\WebPage\Page;
use ODA\Modules\Extended;
use ODA\Modules\Extended\ExtendedExtended;

class WebRoute extends ExtendedExtended {

    /**
     *
     * @var Page
     */
    private static $Page;

    /**
     *
     * @var string
     */
    private $PageClass;

    /**
     *
     * @var string
     */
    private $Url;

    /**
     *
     * @var array
     */
    private $Route = [];

    /**
     * 
     * @param string $Url
     * @param string $PageClass
     * @param Extended $Extended
     */
    public function __construct($Url = 'p', $PageClass = Pages\Home::class, Extended $Extended = NULL) {
        parent::__construct($Extended);

        $this->Url = $Url;
        $this->PageClass = $PageClass;
    }

    /**
     * 
     * @param \ODA\Application\Web\WebRoute $Route
     * @return \ODA\Application\Web\WebRoute
     */
    public function addRoute(WebRoute $Route) {
        $this->Route[$Route->getUrl()] = $Route;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getUrl() {
        return $this->Url;
    }

    /**
     * 
     * @return string
     */
    public function getPageClass() {
        return $this->PageClass;
    }

    /**
     * 
     * @return array
     */
    public function getRoutes() {
        return $this->Route;
    }

    /**
     * 
     * @param string $name
     * @return WebRoute
     */
    public function getRoute($name) {
        return (array_key_exists($name, $this->getRoutes()) ? $this->getRoutes()[$name] : NULL);
    }

    /**
     * 
     * @return Page
     */
    public static function getPage() {
        return self::$Page;
    }

    /**
     * 
     * @param boolean $SubRoute
     * @return \ODA\Application\Web\WebRoute
     */
    public function init($SubRoute = TRUE) {
        $url = filter_input(INPUT_GET, $this->getUrl());
        $Route = $this->getRoutes();

        if ($SubRoute && array_key_exists($url, $Route)) {
            $Route[$url]->init();
        } else {
            $PageClass = $this->getPageClass();
            self::$Page = new $PageClass($this->Extended());
        }

        return $this;
    }

}
