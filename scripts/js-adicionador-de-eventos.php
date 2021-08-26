<script>
const countEvents = function(){
    var currentCount = document.getElementById("tabela-de-eventos").childNodes.length;
    console.log(currentCount);
}

const adicionarEvento = function(){
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
    countEvents();
}
);
</script>