<div id="div-tabela-de-eventos">
    <table id="tabela-de-eventos">
        <tr id="tabela-headers">
            <th>ID</th>
            <th>Título</th>
            <th>Data</th>
            <th>Valor</th>
        </tr>
    </table>
</div>
<div>
    <h2>Inserir Evento</h2>
    <form method="POST">
        <div><label for="titulo-novo-evento">Título</label><div>
        <input type="text" name="titulo-novo-evento" id="titulo-novo-evento">

        <div><label for="data-novo-evento">Data</label><div>
        <input type="text" name="data-novo-evento" id="data-novo-evento">

        <div><label for="valor-novo-evento">Valor</label><div>
        <input type="text" name="valor-novo-evento" id="valor-novo-evento">

        <div><input type="submit" name="adicionar-evento" id="adicionar-evento" value="Adicionar Evento"></div>
    </form>
</div>