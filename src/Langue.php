<?php
/**
 * User: nicolas
 * Date: 22/08/2017
 * Time: 15:49
 */

namespace App;

/**
 * Class Langue
 * @package App
 */
class Langue
{
    /**
     * @var string Langue proposé
     */
    private $langue;
    /** @var  DB */
    private $db;

    /**
     * Langue constructor.
     */
    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * @return string
     */
    public function getLangue(): string
    {
        $id = random_int(1, $this->getMaxID());
        print_r($id);
        $req = $this->db->connect()->prepare("SELECT langue FROM langue WHERE id = ?");
        $req->execute(array($id));
        $data = $req->fetch();
        $this->langue = $data['langue'];
        return $this->langue;
    }

    /**
     * @return int
     */
    public function getMaxID(): int
    {
        $response = $this->db->connect()->query("SELECT MAX(id) AS Max FROM langue;");
        $donnees = $response->fetch();
        print_r($donnees['Max']);
        return (int) $donnees['Max'];
    }
}