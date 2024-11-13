<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Paciente</title>

    <script>
function envia() {
    var nome = document.getElementById('nome').value;
    var leito = document.getElementById('leito').value;

    var url = 'salvar_paciente.php?nome=' + nome + '&leito=' + leito;
    fetch(url)
	.then(response => response.json())
	.then(data => {
	    document.getElementById('mostrar').textContent = "Resultado: " + data.login;
	});
}
    </script>

</head>
<body>

<?php
if (isset($_SESSION['enfermeiro_id']) || isset($_SESSION['medico_id'])) {
    
    if (isset($_SESSION['enfermeiro_id']) && isset($_SESSION['enfermeiro'])) {
        $enfermeiro = $_SESSION['enfermeiro'];
        echo "Enfermeiro {$enfermeiro['nome']} logado com sucesso no sistema";
    }
    else if (isset($_SESSION['medico_id']) && isset($_SESSION['medico'])) {
        $medico = $_SESSION['medico'];
        echo "Médico {$medico['nome']} logado com sucesso no sistema";
    }
} else {
    echo "Você não está logado. Faça Login como Médico ou Enfermeiro!";
    echo "<a href='index.php'><button>Login</button></a>";
    exit();
}
?>
<div id='mostrar'>
    Nome: <input type="text" id="nome" required><br>
    Leito: <input type="text" id="leito" required><br>
    <input type="button" value="Cadastrar" onclick='envia()'>
</div>

</body>
</html>