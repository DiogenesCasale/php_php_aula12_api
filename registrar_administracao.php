<?php
session_start();
include 'db.php';

if (!isset($_SESSION['enfermeiro_id'])) {
    header("Location: login_enfermeiro.php");
    exit();
}

$enfermeiro_id = $_SESSION['enfermeiro_id']; 
$mensagem = '';

if (isset($_GET['receita_id'])) {
    $receita_id = $_GET['receita_id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hora_dig = $_POST['hora_dig'] ?? null;
        if ($hora_dig) {
            try {
                $codigoSQL = "INSERT INTO administracoes (receita_id, enfermeiro_id, data_registro, data_hora_registro)
                              VALUES (:receita_id, :enfermeiro_id, :hora_dig, NOW())";
                
                $comando = $conexao->prepare($codigoSQL);
                $comando->execute([
                    'receita_id' => $receita_id,
                    'enfermeiro_id' => $enfermeiro_id,
                    'hora_dig' => $hora_dig
                ]);
                $mensagem = "Administração registrada com sucesso!";
            } catch (PDOException $e) {
                $mensagem = "Erro ao registrar administração: " . $e->getMessage();
            }
        } else {
            $mensagem = "Por favor, informe a data e hora de administração.";
        }
    }
} else {
    $mensagem = "Receita não encontrada.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administração</title>
</head>
<body>
    <h1>Registrar Administração</h1>

    <?php if ($mensagem): ?>
        <p><?= $mensagem ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="hora_dig">Data e Hora de Administração:</label>
        <input type="datetime-local" id="hora_dig" name="hora_dig" required>
        <button type="submit">Registrar Administração</button>
    </form>
    <br><a href="index.php">Voltar para página inicial</a>
</body>
</html>
