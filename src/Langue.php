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
    /** @var string Langue proposé */
    private $langue;

    /** @var  DB instance permettant l'acces à la base de données*/
    private $db;

    /**
     * Langue constructor.
     */
    public function __construct()
    {
        // Création d'une instance de DB.
        $this->db = new DB();
    }

    /**
     * Fonction retournant une langue inscrite de façon aléatoire
     * @return string Langue a apprendre
     */
    public function getLangue(): string
    {
        // determine aléatoirement l'id de la langue entre un l'ID le plus grand
        $id = random_int(1, $this->getLastID());
        //requete prepare
        $req = $this->db->connect()->prepare("SELECT langue FROM langues WHERE id = ?");
        // execution de la requete
        $req->execute(array($id));
        // recupere le résultat
        $data = $req->fetch();
        $this->langue = $data['langue'];
        // retourne la langue
        return $this->langue;
    }

    /**
     * Fonction qui retourne la dernier ID de la table langues
     * @return int
     */
    public function getLastID(): int
    {
        $response = $this->db->connect()->query("SELECT MAX(id) AS Max FROM langues;");
        $donnees = $response->fetch();
        return (int)$donnees['Max'];
    }
}