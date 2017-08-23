<?php
/**
 * User: nicolas
 * Date: 22/08/2017
 * Time: 15:46
 */

namespace App;
/**
 * Class App
 * @package App
 */
class App
{
    /**
     * @return string
     */
    public function newLangue(): string
    {
        return (new Langue())->getLangue();
    }
}