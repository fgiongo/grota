<?php

$tipos_de_receita_arr = get_json_array("base-de-dados/tipos-de-evento/tipos-de-receita.json");
$tipos_de_receita_str  = json_encode($tipos_de_receita_arr);

?>


<script>
    var tiposDeReceita = <?php echo $tipos_de_receita_str; ?>;
    // console.log(Object.keys(tiposDeReceita).length);

    for (i = 0; i < Object.keys(tiposDeReceita).length; i++) {
        var key = Object.keys(tiposDeReceita)[i];
        var optionEl = document.createElement("option");
        optionEl.value = tiposDeReceita[key].select_option.value;
        optionEl.innerHTML = tiposDeReceita[key].select_option.option_inner_html;
        var optGroupEl = document.getElementById("optgroup_receitas");
        optGroupEl.appendChild(optionEl);

    }
</script>