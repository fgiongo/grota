<?php

// função para ler e decodificar os dados no JSON dos tipos de evento.
// retorna os valores da ponta, ou o array inteiro, que contém os atributos e conteúdo HTML
// necessários para gerar os campos de formulário para cada tipo de evento.

// a estrutura de tipos-de-evento.json é de 4 níveis: 
// ["receitas" ou "despesas"]["tipo de evento"]["campo de formulário"]["element" ou "value" ou "type" ou "name_id" ou "label_inner_html"]
// É boa prática usar a mesma string para o atributo 'nome' e o atributo 'id' em HTML? Vi em algum lugar, achei prático, tenho usado.

// essa função aceita 4 argumentos (os nodes da estrutura) ou nenehum (nesse caso, retorna a estrutura inteira em array)
function get_tipos_de_evento($key1 = null, $key2 = null, $key3 = null, $key4 = null) {
    
    $tipos_de_evento_str = file_get_contents("tipos-de-evento.json");
    $tipos_de_evento_arr = json_decode($tipos_de_evento_str, TRUE);

    if ($key1 !== null || $key2 !== null || $key3 !== null || $key4 !== null) {

        return $tipos_de_evento_arr[$key1][$key2][$key3][$key4];

    } else {

        return $tipos_de_evento_arr;
    }
}

echo get_tipos_de_evento("receitas", "doacao_de_pessoa_fisica", "cpf", "element");
print_r (get_tipos_de_evento());

