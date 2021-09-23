<?php
class question_controller
{
    public static function index()
    {
        include_once "view/question.php";
    }
    public static function json()
    {
        $Variable="Hola yo soy ";
        include_once "view/json.php";
    }

}
