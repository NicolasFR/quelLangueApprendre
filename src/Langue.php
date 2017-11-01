<?php
/**
 * User: nicolas
 * Date: 22/08/2017
 * Time: 15:49
 */

namespace App;

/**
 * Classe Langue
 * @author Nicolas Ferrier <nicolas.ferier.nf@gmail.com>
 * @package App
 */
class Langue
{
    /**
     * Langue proposée à l'utilisateur
     * @var string
     */
    private $langue;

    /**
     * instance permettant l'acces à la base de données
     * @var  DB
     */
    private $db;

    /**
     * Constructeur de la classe Langue
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
        $data = $this->db->prepare("SELECT langue FROM langues WHERE id = ?", [$id], false);
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
        $donnees = $this->db->query("SELECT MAX(id) AS Max FROM langues;", false);
        return (int)$donnees['Max'];
    }
}
