<?php

namespace model;

// CLASSE SINGLETON

class DBAccess {

    private $PDOInstance = null;
    private static $instance = null;

    public function __construct() {
        // OVH
        $properties = parse_ini_file("controller/connect.properties");
        // LOCAL
        //$properties = parse_ini_file("controller/" .DB_ACCESS. ".properties");
        $protocole = $properties["protocole"];
        $serveur = $properties["serveur"];
        $port = $properties["port"];
        $user = $properties["user"];
        $mdp = $properties["mdp"];
        $db = $properties["bd"];
        try {
            $this->PDOInstance = new \PDO("$protocole:host=$serveur;"
                    . "dbname=$db;charset=utf8", $user, $mdp);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getDBInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new DBAccess();
        }
        return self::$instance;
    }

    protected function dbClose(\PDO $db) {
        try {
            $db = null;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function prepare($sql) {
        return $this->PDOInstance->prepare($sql);
    }
    
    public function query($sql) {
        return $this->PDOInstance->query($sql);
    }

    public function inTransaction() {
        return $this->PDOInstance->inTransaction();
    }

    public function beginTransaction() {
        return $this->PDOInstance->beginTransaction();
    }

    public function commit() {
        return $this->PDOInstance->commit();
    }

    public function lastInsertId() {
        return $this->PDOInstance->lastInsertId();
    }
    
}
