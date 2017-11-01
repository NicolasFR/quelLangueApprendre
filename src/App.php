<?php
/**
 * User: nicolas
 * Date: 22/08/2017
 * Time: 15:46
 */

namespace App;

/**
 * Classe App
 * @author Nicolas Ferrier <nicolas.ferier.nf@gmail.com>
 * @package App
 */
class App
{
    /**
     * Permet l'affichage de la langue
     * @return string
     */
    public function newLangue(): string
    {
        return (new Langue())->getLangue();
    }
}
