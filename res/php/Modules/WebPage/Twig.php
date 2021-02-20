<?php

namespace ODA\Modules\WebPage;

use ODA\Util\Functions;

/**
 * Clase principal contenedora de los métodos para manejar plantillas en formato Twig
 * @link https://twig.sensiolabs.org/doc/1.x/templates.html
 */
class Twig {

    /**
     * 
     * @var string Ubicación del archivo de la plantilla Twig que esta ubicado en $Twig_Template_Folder por defecto es base.twig
     * @see $Twig_Template_Folder
     */
    private $Template_File;

    /**
     * 
     * @var string Carpeta base contenedora de todas las plantillas Twig. por defecto esta ubicado en la carpeta twig
     */
    private $Twig_Template_Folder;

    /**
     *
     * @var array Set de Variables manejadas y transmitidas a las plantillas Twig
     */
    private $Twig_Vars;

    /**
     *
     * @var \Twig_Loader_Filesystem Componente del módulo Twig que maneja directorios de plantillas
     * @link https://twig.symfony.com/doc/1.x/api.html
     */
    private $Twig_Loader_Filesystem;

    /**
     *
     * @var \Twig_Environment Componente de módulo Twig que maneja la configuración principal.
     * @link https://twig.symfony.com/doc/1.x/api.html
     */
    private $Twig_Environment;

    /**
     * Función constructora de la clase. Establece todos los valores de configuracion por defecto.
     * @param string $Twig_File
     * @param array $Twig_Folder
     * @param array $Twig_Cache
     * Es necesario crear un objeto antes de ejecutar cualquier método
     * @example ./docs/examples/Components/Twig.md 2 2 Creacion del objeto Twig
     */
    public function __construct($Twig_File = 'base.twig', $Twig_Folder = [__DIR__, "..", "..", "..", 'twig'], $Twig_Cache = [__DIR__, "..", "..", "..", "..", 'compilation_cache']) {
        $this->Twig_Template_Folder = Functions::parseDir($Twig_Folder);
        $this->Template_File = $Twig_File;
        $this->Twig_Vars = [];

        $this->Twig_Loader_Filesystem = new \Twig_Loader_Filesystem($this->Twig_Template_Folder);
        $this->Twig_Environment = new \Twig_Environment($this->Twig_Loader_Filesystem, array(
            'cache' => Functions::parseDir($Twig_Cache),
            'output_encoding' => 'UTF-8',
            'auto_reload' => true,
            'debug' => true
        ));

        $this->addExtension(new \Twig\Extension\DebugExtension());
    }

    /**
     * Establece el archivo que será usado de plantilla en el objeto actual.
     * El Archivo tiene que estar ubicado en $Twig_Template_Folder.
     * Solo se puede cargar un archivo por objeto, si quieres cargar más de uno tiene que usar la sintaxis Twig
     * @see $Twig_Template_Folder
     * @param string $template Nombre del archivo o ubicación relativa a $Twig_Template_Folder
     * @example ./docs/examples/Components/Twig.md 7 9 Establecer archivo de plantilla
     */
    public function setTemplate($template) {
        $this->Template_File = $template;
    }

    /**
     * Regresa el valor de $Template_File
     * @see $Template_File
     * @return string Archivo o ubicación relativa de la plantilla actual
     */
    public function getTemplate() {
        return $this->Template_File;
    }

    /**
     * Añade filtros del módulo Twig
     * @link https://twig.symfony.com/doc/1.x/filters/index.html
     * @link https://twig.symfony.com/doc/1.x/advanced.html
     * @param string $filter_name Nombre del filtro que sera llamado desde las plantillas Twig
     * @param string $filter_function Funcion PHP que sera invocada en las plantillas Twig
     * @example ./docs/examples/Components/Twig.md 17 6 Establece un filtro nuevo
     */
    public function addFilter($filter_name, $filter_function) {
        $this->Twig_Environment->addFilter($filter_name, new \Twig_Filter_Function($filter_function));
    }

    /**
     * 
     * @param interface $extension
     */
    public function addExtension($extension) {
        $this->Twig_Environment->addExtension($extension);
    }

    /**
     * 
     * @param type $lexer
     */
    public function setLexer($lexer) {
        $this->Twig_Environment->setLexer($lexer);
    }

    /**
     * 
     * @return type
     */
    public function getEnvironment() {
        return $this->Twig_Environment;
    }

    /**
     * Agrega variables que serán usadas posteriormente en la plantilla Twig
     * @param string $name Nombre de la variable (Pueden ser multidimensionales separadas por un punto)
     * @param string|array $value Valor de la variable puede ser un array o cualquier tipo de objeto
     * @example ./docs/examples/Components/Twig.md 24 10 Añade variables
     */
    public function setVar($name, $value) {
        Functions::set_array_value($this->Twig_Vars, $name, $value);
    }

    /**
     * Agrega un arreglo de variables a la plantilla
     * @param array $vars
     * @example ./docs/examples/Components/Twig.md 35 9 Añade variables
     */
    public function setVars(array $vars) {
        foreach ($vars as $k => $v) {
            $this->setVar($k, $v);
        }
    }

    /**
     * Regresa el valor de $Twig_Vars
     * @return array
     * @see $Twig_Vars
     */
    public function getVars() {
        return $this->Twig_Vars;
    }

    /**
     * Regresa el valor de una variable ubicada en $Twig_Vars.
     * El nombre puede estar separado por puntos en variables multidimensionales 
     * @param string $name Indice dentro de $Twig_Vars
     * @see $Twig_Vars
     * @example ./docs/examples/Components/Twig.md 45 7 Retorna variable
     */
    public function getVar($name) {
        return Functions::get_array_value($this->Twig_Vars, $name);
    }

    /**
     * Compila la plantilla Twig y regresa un string listo para ser mostrado
     * @see $Twig_Environment
     * @see $Template_File
     * @see $Twig_Vars
     * @example ./docs/examples/Components/Twig.md 53 2 Muestra plantilla
     * @return string
     */
    public function getRender() {
        return $this->Twig_Environment->render($this->Template_File, $this->Twig_Vars);
    }

}
