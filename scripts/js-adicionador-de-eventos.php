<script>
//retorna numero de eventos
function eventCounter(){
    let currentCount = document.getElementById("tabela-de-eventos").childNodes.length;
    return currentCount;
}

//string teste para POST com AJAX
const ajaxPostStr = "this text was posted using AJAX!";
const ajaxPostUrl = "scripts/ajax-handler.php";

//novo request de POST
function ajaxPost(str, url){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open("POST", url);
    httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpRequest.send("str=" + encodeURIComponent(str));

    //resposta do servidor (na forma de echo do php, ô loco)
    function alertContents(){
        if (httpRequest.readyState === XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                var response = JSON.parse(httpRequest.responseText);
                alert(response.computedStr);
                
            } else {
                alert("There was a problem with your request");
            }
        }
    }

}



//cria os els de html para inserir evento na tabela
function adicionarEvento(){
    const eventoTitulo = document.getElementById("titulo-novo-evento").value;
    const eventoData = document.getElementById("data-novo-evento").value;
    const eventoValor = document.getElementById("valor-novo-evento").value;

    if (
        !document.getElementById("evento-id-1")
    ) {
        console.log("tabela vazia")
        const novaLinha = document.createElement("tr");
        const novaId = document.createElement("td");
        const novoTitulo = document.createElement("td");
        const novaData = document.createElement("td");
        const novoValor = document.createElement("td");

        novaId.id = "evento-id-1";
        novaId.innerHTML = "1";
        novoTitulo.innerHTML = eventoTitulo;
        novaData.innerHTML = eventoData;
        novoValor.innerHTML  = eventoValor;

        novaLinha.appendChild(novaId);
        novaLinha.appendChild(novoTitulo);
        novaLinha.appendChild(novaData);
        novaLinha.appendChild(novoValor);
        document.getElementById("tabela-de-eventos").appendChild(novaLinha);

    } else {

        const novaLinha = document.createElement("tr");
        const novaId = document.createElement("td");
        const novoTitulo = document.createElement("td");
        const novaData = document.createElement("td");
        const novoValor = document.createElement("td");

        novaId.id = "evento-id-" + ((document.getElementById("tabela-de-eventos").childNodes.length) - 1);
        novaId.innerHTML = document.getElementById("tabela-de-eventos").childNodes.length - 1;
        novoTitulo.innerHTML = eventoTitulo;
        novaData.innerHTML = eventoData;
        novoValor.innerHTML  = eventoValor;

        novaLinha.appendChild(novaId);
        novaLinha.appendChild(novoTitulo);
        novaLinha.appendChild(novaData);
        novaLinha.appendChild(novoValor);
        document.getElementById("tabela-de-eventos").appendChild(novaLinha);

    }
}

document.getElementById("adicionar-evento").addEventListener("click", function(e){
    e.preventDefault();
    adicionarEvento();
    console.log(eventCounter());
    ajaxPost(ajaxPostStr, ajaxPostUrl);

}
);
</script>