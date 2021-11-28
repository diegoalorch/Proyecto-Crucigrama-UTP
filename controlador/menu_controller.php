<?php 
class menu_controller
{
    public static function index()
    {
        include_once "view/menu.php";
    }
    public static function personaje()
    {
        include_once "view/personaje.php";
    }
    public static function score()
    {
        include_once "view/score.php";
    }
}
