

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Enfermeiro</title>

    <script>
function envia() {
    var nome = document.getElementById('nome').value;
    var coren = document.getElementById('coren').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;

    var url = 'salvar_enfermeiro.php?nome=' + nome + '&coren=' + coren + '&usuario=' + usuario + '&senha=' + senha;
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
    COREN: <input type="text" id="coren" required><br>
    Usuário: <input type="text" id="usuario" required><br>
    Senha: <input type="text" id="senha" required><br>
    <input type="button" value="Cadastrar" onclick='envia()'>
</div>

</body>
</html>