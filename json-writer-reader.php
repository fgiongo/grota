<?php

// função que retorna os dados de tipos-de-eventos-receitas na forma de array estruturado:
//["tipo de evento"]["campo de formulário"]["element" ou "value" ou "type" ou "name_id" ou "label_inner_html"]
// essa função aceita 3 argumentos (os nodes da estrutura) ou nenehum (nesse caso, retorna a estrutura inteira em array)
function get_tipos_de_evento_receitas($key1 = null, $key2 = null, $key3 = null) {
    
    $tipos_de_evento_receitas_str = file_get_contents("base-de-dados/tipos-de-evento/tipos-de-evento-receitas.json");
    $tipos_de_evento_receitas_arr = json_decode($tipos_de_evento_receitas_str, TRUE);

    if ($key1 !== null && $key2 !== null && $key3 !== null) {

        return $tipos_de_evento_receitas_arr[$key1][$key2][$key3];

    } else {

        return $tipos_de_evento_receitas_arr;
    }
}

// função que retorna um objeto-teste (array) na estrutura de tipos-de-evento-receitas.json
function objeto_teste() {
    $novo_tipo_de_evento = array(
        "select_option" => array(
            "value" => "novo-tipo-de-evento",
            "option_inenr_html" => "Novo Tipo de Evento"
        ),
        "valor" => array(
            "element" => "input",
            "type" => "text",
            "name_id" => "novo-tipo-de-evento-valor",
            "label_inner_html" => "Valor: "
        ),
        "data" => array(
            "element" => "input",
            "type" => "text",
            "name_id" => "novo-tipo-de-evento-data",
            "label_inner_html" => "Data: "
        )
        );
    return $novo_tipo_de_evento;
}



// retorna array atualizado com novo valor (array $_POST)
function update_content($new_arr, $json_path) {

    if (file_exists($json_path)) {
        $json_str = file_get_contents($json_path);
        $json_arr = json_decode($json_str, true);
        echo "file exists\n";

        if (is_array($json_arr)){
            array_push($json_arr, $new_arr);
            echo "file is array";
            return $json_arr;

        } else {
            echo "file is not array\n";
            return array($new_arr);
        }

    } else {
        echo "file doesn't exist\n";
        return array($new_arr);
    }
}

// Escreve ou re-escreve um json usando array
function write_arr_to_json($arr, $json_path) {
    $arr_to_str = json_encode($arr, JSON_PRETTY_PRINT);
    $file = fopen($json_path, "w");

    fwrite($file, $arr_to_str);
    fclose($file);
}

// re-escreve json da base de dados com
function update_json($new_arr, $json_path) {
    $updated_arr = update_content($new_arr, $json_path);
    write_arr_to_json($updated_arr, $json_path);
}

update_json(objeto_teste(), "base-de-dados/tipos-de-evento/tipos-de-evento-receitas.json");
