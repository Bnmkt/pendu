<?php
/**
 * Created by PhpStorm.
 * User: LydiaPC
 * Date: 01/03/18
 * Time: 14:36
 */
namespace Pendu\Game;
trait Pendu_cookie
{
    private function getCookie($name){
        return (isset($_COOKIE))? (isset($_COOKIE[$name]))? $_COOKIE[$name] :null :null;
    }
    private function setCookie($name, $data){
        setcookie($name, $data, time()+60*60*24);
    }
}