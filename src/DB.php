<?php
/**
 * User: nicolas
 * Date: 22/08/2017
 * Time: 16:07
 */

namespace App;

use PDO;

/**
 * Class DB
 * @package App
 */
class DB
{
    /**
     * PDO instance
     * @var \PDO
     */
    private $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect()
    {
        if ($this->pdo == null) {
            try {
                $strConnection = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME;
                $arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $this->pdo = new PDO($strConnection, Config::DB_USER, Config::DB_PASS, $arrExtraParam);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                die($msg);
            }
        }
        return $this->pdo;
    }
}