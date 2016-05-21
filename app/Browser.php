<?php
/**
 * Created by PhpStorm.
 * User: jalawren
 * Date: 3/11/16
 * Time: 6:16 PM
 */

namespace App;



use BrowserDetect;

class Browser
{

    public function getInfo()
    {
        return BrowserDetect::detect();
    }
}