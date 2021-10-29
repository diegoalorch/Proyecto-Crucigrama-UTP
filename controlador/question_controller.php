<?php
class question_controller
{
    public static function index()
    {
        include_once "view/question.php";
    }
    public static function json()
    {
        $data=json_decode(file_get_contents("question.json"),true);
        include_once "view/json.php";
    }
    public static function filtrador()
    {
        $data=json_decode(file_get_contents("question.json"),true);
        include_once "view/filtrador.php";
    }

}
/* foreach ($data as $valor) {?>
    <h1>hola</h1>
    <?php } */
