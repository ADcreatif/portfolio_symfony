<?php

namespace App\Structure;

use PDO;

class Database {
    private $pdo;

    public function __construct() {
        $DBNAME = "portfolio";
        $DBUSER = "root";
        $DBPASS = "";
        $DEBUG = true;

        $this->pdo = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSER, DBPASS);

        if ($DEBUG === true) {
            // active l'affichage des erreurs PDO
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        $this->pdo->exec('SET NAMES UTF8');
    }

    public function executeSql($sql, array $values = array()) {
        $query = $this->pdo->prepare($sql);

        $query->execute($values);

        return $this->pdo->lastInsertId();
    }

    public function query($sql, array $criteria = array()) {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne($sql, array $criteria = array()) {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}