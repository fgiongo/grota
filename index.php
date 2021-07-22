<?php

include "input-de-eventos.php";

$tipos_de_evento_str = file_get_contents("tipos-de-evento.json");
$tipos_de_evento_arr = json_decode($tipos_de_evento_str, TRUE);
print_r($tipos_de_evento_arr);
echo $tipos_de_evento_arr["receitas"]["tipo_1"]["nome"];


