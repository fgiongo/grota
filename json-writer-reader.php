<?php

// função que retorna os dados de tipos-de-eventos-receitas na forma de array estruturado:
//["tipo de evento"]["campo de formulário"]["element" ou "value" ou "type" ou "name_id" ou "label_inner_html"]
// essa função aceita 3 argumentos (os nodes da estrutura) ou nenehum (nesse caso, retorna a estrutura inteira em array)
function get_tipos_de_evento_receitas($key1 = null, $key2 = null, $key3 = null) {
    
    $tipos_de_evento_receitas_str = file_get_contents("base-de-dados/tipos-de-evento/tipos-de-evento-receitas.json");
    $tipos_de_evento_receitas_arr = json_decode($tipos_de_evento_receitas_str, TRUE);

    if ($key1 !== null || $key2 !== null || $key3 !== null) {

        return $tipos_de_evento_receitas_arr[$key1][$key2][$key3];

    } else {

        return $tipos_de_evento_receitas_arr;
    }
}

// função que retorna um objeto-teste (array) na estrutura de tipos-de-evento-receitas.json
function gerar_objeto_teste() {
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


// re-escreve tipos-de-evento-receitas.json com o objeto-teste anexado
function write_to_json($arr) {
    $tipos_de_evento = get_tipos_de_evento_receitas();
    array_push($tipos_de_evento, $arr);
    $tipos_de_evento_receitas_json = fopen("base-de-dados/tipos-de-evento/tipos-de-evento-receitas.json", "w");
    $tipos_de_evento_str = json_encode($tipos_de_evento, JSON_PRETTY_PRINT);
    fwrite($tipos_de_evento_receitas_json, $tipos_de_evento_str);
    fclose($tipos_de_evento_receitas_json);
}

write_to_json(gerar_objeto_teste());

