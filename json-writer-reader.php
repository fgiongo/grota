<?php

function get_json_array($path) {
    
    $json_str = file_get_contents($path);
    $json_arr = json_decode($json_str, TRUE);
    return $json_arr;

}

// atualiza array de json com novo conteudo
function update_json_content($new_arr, $json_path) {

    // checa se o arquivo existe
    if (file_exists($json_path)) {
        $json_arr = get_json_array($json_path);

        // checa se arquivo está vazio/nulo
        if (is_array($json_arr)){
            array_push($json_arr, $new_arr);
            return $json_arr;

        // caso contrário, retorna somente o conteúdo novo
        } else {
            return array($new_arr);
        }
    } else {
        return array($new_arr);
    }
}

// escreve json a partir de array
function write_arr_to_json($arr, $json_path) {
    $arr_to_str = json_encode($arr, JSON_PRETTY_PRINT);
    $file = fopen($json_path, "w");

    fwrite($file, $arr_to_str);
    fclose($file);
}

// atualiza arquivo json com conteudo novo
function update_json($new_arr, $json_path) {
    if ($new_arr !== null){
        $updated_arr = update_json_content($new_arr, $json_path);
        write_arr_to_json($updated_arr, $json_path);
    }
}


update_json($_POST, "base-de-dados/eventos/receitas.json");
