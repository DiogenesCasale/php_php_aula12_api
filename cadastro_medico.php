<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Médico</title>

    <script>
function envia() {
    var nome = document.getElementById('nome').value;
    var especialidade = document.getElementById('especialidade').value;
    var crm = document.getElementById('crm').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;

    var url = 'salvar_medico.php?nome=' + nome + '&especialidade=' + especialidade + '&crm=' + crm + '&usuario=' + usuario + '&senha=' + senha;
    fetch(url)
	.then(response => response.json())
	.then(data => {
	    document.getElementById('mostrar').textContent = "Resultado: " + data.login;
	});
}
    </script>

</head>
<body>

<div id='mostrar'>

    Nome: <input type="text" id="nome" required><br>
    Especialidade: <input type="text" id="especialidade" required><br>
    CRM: <input type="text" id="crm" required><br>
    Usuário: <input type="text" id="usuario" required><br>
    Senha: <input type="text" id="senha" required><br>
    <input type="button" value='Cadastrar' onclick='envia()'>

</div>
</body>
</html>