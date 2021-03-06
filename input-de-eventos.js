//checa se determinada parte do formulario nao foi preenchida
var isEmpty = function(val){
    return (val === undefined || val == null || val.length <= 0) ? true : false;
}

var validate = function(el) {
    if(isEmpty(el)){
        console.log("Field is empty");
    }
}

document.getElementById("input-submit-criar-evento").addEventListener("click", validate(document.getElementById("select-tipo-de-evento")))

// Por enquanto faz uma validação básica, se você quiser entender a fundo e fazer tudo manda brasa.
// Mas dá uma olhada e vê se algum desses te atrai (tbm ajuda ler o código que a galera escreve pra ver como fazem):
// https://pristine.js.org/
// https://github.com/horprogs/Just-validate
// https://formvalidation.io/
// https://joi.dev/api/?v=17.4.1
//mantive esses comments acima pq sou preguiçoso e não anotei os links em outro lugar.


//caio, vê se isso faz sentido:
//essa função gera o HTML para adicionar um campo de formulário extra, "nome-completo",
//mas somente quando o usuario seleciona a opção "salário de colaborador" da caixa de seleção do topo.
var nomeCompletoDinamico = function(){
    
    var campoTipoDeEvento = document.getElementById("select-tipo-de-evento");
    var divCamposDinamicos = document.getElementById("div-campos-dinamicos");

    if(campoTipoDeEvento.value === "outro" && !divCamposDinamicos.contains(document.getElementById("div-nome-do-evento"))){
        
        var formDiv = document.createElement("div");
        formDiv.setAttribute("id", "div-nome-do-evento");
        formDiv.className = "div-elemento-de-formulario";
        
        var labelDiv = document.createElement("div");
        labelDiv.setAttribute("id", "div-label");
        
        var labelEl = document.createElement("label");
        labelEl.setAttribute("id", "label-nome-do-evento");
        labelEl.setAttribute("for", "nomedo-evento");
        labelEl.innerHTML = "Nome do Evento:";
        
        var formEl = document.createElement("input");
        formEl.setAttribute("id", "nome-do-evento");
        formEl.setAttribute("name", "nome-do-evento");
        formEl.setAttribute("type", "text");
        
        document.getElementById("div-campos-dinamicos").appendChild(formDiv);
        document.getElementById("div-nome-do-evento").appendChild(labelDiv);
        document.getElementById("div-label").appendChild(labelEl);
        document.getElementById("div-nome-do-evento").appendChild(formEl);
        
    } else if (campoTipoDeEvento.value !== "outro" && divCamposDinamicos.contains(document.getElementById("div-nome-do-evento"))) {
        divCamposDinamicos.removeChild(document.getElementById("div-nome-do-evento"));
    }
}

document.getElementById("select-tipo-de-evento").addEventListener("click", nomeCompletoDinamico);





