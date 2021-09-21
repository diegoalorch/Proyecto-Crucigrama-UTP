<?php
// Redireccionar
require 'direccion.php';

require_once './controlador/menu_controller.php';
require_once './controlador/nivel_controller.php';
require_once './controlador/question_controller.php';

$uriSplit = explode('/', $_SERVER['REQUEST_URI']);
$code = explode('/', $_SERVER['REQUEST_URI']);
if (isset($uriSplit[1]) && isset($uriSplit[2])) {

    #Metodo
    $metodo = $uriSplit[2];

    #Controlador
    $controlador = $uriSplit[1];
    $uriSplit = explode('/', $_SERVER['REQUEST_URI']);
    switch ($controlador) {
        case "menu":
            /* escoger personaje*/
            /* escoger dificultades */
            if (method_exists(new menu_controller(), $metodo)) {
                menu_controller::$metodo();
            } else {
                menu_controller::index();
            }
            break;
        case "quiestion":
            /* pestaña de nivel */
            if (method_exists(new question_controller(), $metodo)) {
                question_controller::$metodo();
            } else {
                menu_controller::index();
            }
            break;

        case "niveles":
            /* /dificultad de las preguntas */
            
            /* /id de la pregunta */
            if (method_exists(new nivel_controller(), $metodo)) {
                nivel_controller::$metodo();
            } else {
                menu_controller::index();
            }
            break;
        default:
            menu_controller::index();
            break;
    }
} else {
    menu_controller::index();
}
