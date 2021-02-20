<?php

namespace ODA\Modules\Extended;

/**
 * @todo Documentacion
 * Clase principal que controla y proporciona todos los métodos de la base de datos
 */
class Database {

    /**
     * Constructor
     */
    public function __construct() {
        $this->Connection = new Database\DatabaseConnection();
    }

    /**
     * Método que cierra la conexión MySQLi
     */
    public function close() {
        $conn = $this->getConnection();

        if ($conn) {
            $conn->getMySQLi()->close();
        } else {
            
        }
    }

    /**
     * 
     * @param string $charset
     */
    public function charset($charset) {
        $conn = $this->getConnection();
        if ($conn) {
            mysqli_set_charset($conn, $charset);
        }
    }

    /**
     * Ejecuta un <b>mysqli_query</b> a la base de datos
     * @param string $sql Cadena de texto con comando SQL
     * @return \mysqli_result Regresa objecto <b>mysqli_result</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public function query($sql) {
        $conn = $this->getConnection();
        if ($conn) {
            $mysqli = $conn->getMySQLi();
            if ($mysqli) {
                return $mysqli->query($sql);
            }
        } else {
            
        }
        return NULL;
    }

    /**
     * Ejecuta un <b>mysqli_stmt</b> a la base de datos
     * @param string $statement Cadena de texto con comando SQL
     * @return \mysqli_stmt Regresa objecto <b>mysqli_stmt</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public function prepare($statement) {
        $conn = $this->getConnection();

        if ($conn) {
            $mysqli = $conn->getMySQLi();
            if ($mysqli) {
                return $mysqli->prepare($statement);
            }
        } else {
            
        }
        return NULL;
    }

    /**
     * Regresa Objecto MySQLi
     * @return Database\DatabaseConnection
     */
    public function getConnection() {
        return ($this->Connection ? $this->Connection : NULL);
    }

    /**
     * Regresa una cadena de texto con la descripción del ultimo error
     * @return string Una cadena de texto que describe el error o una cadena de texto
     * vacia si no existe ninguno
     */
    public function getError() {
        return ($this->getConnection() ? mysqli_error($this->getConnection()->getMySQLi()) : "Instancia controladora MySQLi no conectada");
    }

    /**
     * 
     * @return int
     */
    public function getLastId() {
        return ($this->getConnection() ? $this->getConnection()->getMySQLi()->insert_id : 0);
    }

    /**
     * 
     * @return \mysqli_result
     */
    public function disableForeignKeyChecks() {
        return $this->query("SET FOREIGN_KEY_CHECKS=0;");
    }

    /**
     * 
     * @return \mysqli_result
     */
    public function enableForeignKeyChecks() {
        return $this->query("SET FOREIGN_KEY_CHECKS=1;");
    }

}
