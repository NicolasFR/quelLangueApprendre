<?php
/**
 * User: nicolas
 * Date: 22/08/2017
 * Time: 16:07
 */

namespace App;

use PDO;

/**
 * Classe DB
 * @author Nicolas Ferrier <nicolas.ferier.nf@gmail.com>
 * @package App
 */
class DB
{
    /**
     * Instance de PDO
     * @var \PDO
     */
    private $pdo;

    /**
     *
     * @param string $statement
     * @param bool $all
     * @return array|mixed
     */
    public function query(string $statement, bool $all)
    {
        $response = $this->getPDO()->query($statement);
        if ($all) {
            return $response->fetchAll();
        } else {
            return $response->fetch();
        }
    }

    /**
     * Retourne une instance de l'objet PDO connecté à la base de données
     * @return PDO
     * @throws \Exception
     */
    private function getPDO()
    {
        if ($this->pdo === null) {
            try {
                $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME;
                $arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $this->pdo = new PDO($dsn, Config::DB_USER, Config::DB_PASS, $arrExtraParam);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                throw new \Exception("PDO - Connexion impossible à la base de données");
            }
        }
        return $this->pdo;
    }

    /**
     *
     * @param string $statement
     * @param array $params
     * @param bool $all
     * @return array|mixed
     */
    public function prepare(string $statement, array $params, bool $all)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($params);
        if ($all) {
            return $req->fetchAll();
        } else {
            return $req->fetch();
        }
    }

    /**
     * @param string $statement
     */
    public function exec(string $statement)
    {
        $this->getPDO()->exec($statement);
    }
}
