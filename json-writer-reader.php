<?php

// aqui entram as funções set_tipos_de_evento e set_eventos
// elas precisam ser executadas antes das funções get
// elas vão usar os dados da variável global $_POST para re-escrever os JSON da base de dados
// isso vai acontecer todas as vezes que a página for 

print_r($_POST);


// função para ler e decodificar os dados no JSON dos tipos de evento.
// retorna os valores da ponta, ou o array inteiro, que contém os atributos e conteúdo HTML
// necessários para gerar os campos de formulário para cada tipo de evento.

// a estrutura de tipos-de-evento-receitas.json e tipos-de-evento-despesas é de 3 níveis: 
// ["tipo de evento"]["campo de formulário"]["element" ou "value" ou "type" ou "name_id" ou "label_inner_html"]
// É boa prática usar a mesma string para o atributo 'nome' e o atributo 'id' em HTML? Vi em algum lugar, achei prático, tenho usado.

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

//echo get_tipos_de_evento_receitas("doacao_de_pessoa_fisica", "cpf", "element");
//echo "\n";
//print_r (get_tipos_de_evento_receitas());

/*
// testando abrir um diretório novo e escrever um JSON
mkdir ("test-directory");
$testfile = fopen("test-directory/testfile.json", "w");
$testfile_content = "{\n \"object_key\" : \"object value\"\n }";
fwrite ($testfile, $testfile_content);
fclose($testfile);
*/
