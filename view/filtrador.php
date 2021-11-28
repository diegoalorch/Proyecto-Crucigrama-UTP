<?php
function fintrador($var)
{
    if (isset($_POST['data'])) {
        if ($var["id"] == $_POST['data']) {
            return $var;
        }
        
    }
    
}
echo json_encode(array_filter($data[$_POST['nivel']], "fintrador"));
