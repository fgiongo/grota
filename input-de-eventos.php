<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Input de Eventos</title>
        <link rel="stylesheet" href="input-de-eventos.css">
    </head>
    <body>

        <!-- cabecalho -->
        <div id="cabecalho">
            <h1>Sistema de Controle Contábil-financeiro do Espaço Cultural da Grota</h1>
        </div>

        <!-- abas principais  -->
        <div>
            <button class="aba">
                Entrada de eventos
            </button>
            <button class="aba">
                Centros de custo
            </button>
            <button class="aba">
                Relatórios
            </button>
        </div>

        <!-- formulario para entrada de eventos financeiros -->
        <div id="div-formulario">
            <h2>Novo Evento</h2>
            <form name="form-entrada-de-eventos" id="form-entrada-de-eventos" action = "" method="POST">

                <!-- selecionar tipo de evento -->
                <div class="div-elemento-de-formulario" id="div-tipo-de-evento">
                    <div id="div-label-tipo-de-evento"><label id= "label-tipo-de-evento" for="select-tipo-de-evento">Selecione o tipo de evento: </label></div>
                    <select name="select-tipo-de-evento" id="select-tipo-de-evento" size=10>
                        <optgroup label="Despesas">
                            <option value="despesa-administrativa">Despesa Administrativa</option>
                            <option value="salario-de-colaborador">Salário de Colaborador</option>
                        </optgroup>
                        <optgroup label="Receitas">
                            <option value="doacao-de-pessoa-fisica">Doação de Pessoa Física</option>
                        </optgroup>
                    </select>
                    <input id="button-novo-tipo-de-evento" type="button" name="button-novo-tipo-de-evento" value="Inserir novo tipo de evento">
                </div>

                <div id="div-campos-dinamicos">
                    <!-- campos dinamicos de js entram aqui -->
                </div>

                <!-- inserir valor -->
                <div class="div-elemento-de-formulario">
                    <label for="input-text-valor-do-evento">Valor:<br> R$ </label>
                    <input type="text" name="input-text-valor-do-evento" id="input-text-valor-do-evento"> <!--placeholder="0,00"-->
                </div>

                <!-- inserir data de realizacao ou vencimento -->
                <div class="div-elemento-de-formulario">
                    <label for="input-text-data-de-realizacao">Data de realização/Data de vencimento: </label><br>
                    <input type="text" name="input-text-data-de-realizacao" id="input-text-data-de-realizacao"> <!--placeholder="dd/mm/aaaa"-->
                </div>
                <div class="div-elemento-de-formulario">
                    <input type="submit" name="input-submit-criar-evento" id="input-submit-criar-evento" value="Criar Evento">
                </div>
            </form>
        </div>

        <script src="input-de-eventos.js"></script>
    </body>
</html>
