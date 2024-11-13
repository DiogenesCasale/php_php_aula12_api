<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Receitas Pendentes</title>

    <script>
function envia() {
   
    var url = 'listar_receitas.php';
    fetch(url)
	.then(response => response.json())
	.then(data => {
	    document.getElementById('mostrar').innerHTML = "Receitas Pendentes: <br>" + data.login;
	});
}
envia();
    </script>

</head>
<body>
<input type="button" value="Atualizar" onclick='envia()'>
<div id='mostrar'>

</div>

</body>
</html>