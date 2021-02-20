<?php

namespace ODA\Modules\Extended\Database;

use ODA\Modules\Extended\Database;

/**
 * @todo Documentar
 * Clase controladora de la conexión MySQLi
 */
class DatabaseConnection {

    /**
     * Objecto MySQLi
     * @var \mysqli 
     */
    private $MySQLi;

    /**
     * Regresa instancia de conexión MySQLi además de la instancia de configuración
     */
    public function __construct() {
        $this->connect();
    }

    /**
     * Función que intenta crear instancia MySQLi con la configuración asignada
     * @return Database\Connection
     */
    public function connect() {
        $Config = [
            'server' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'sistama_oda'
        ];

        $MySQLi = new \mysqli($Config['server'], $Config['user'], $Config['password'], $Config['database']);

        if ($MySQLi->connect_errno) {
            $this->MySQLi = NULL;
        } else {
            $this->MySQLi = $MySQLi;
        }
        return $this;
    }

    /**
     * Regresa Objecto MySQLi
     * @return \mysqli|NULL Instancia <b>MySQLi</b> proporcionada por PHP NULL Si no esata conectado a la base de datos
     */
    public function getMySQLi() {
        return ($this->MySQLi !== NULL && !$this->MySQLi->connect_errno ? $this->MySQLi : NULL);
    }

}
