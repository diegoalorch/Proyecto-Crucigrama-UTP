<?php
// print_r($data["Facil"]);
/* shuffle($data["Facil"]);
print_r($data["Normal"]); */
if (isset($_POST['data'])) {
   
    echo json_encode(explode(',', $_POST['data']));
    
    exit;
}
