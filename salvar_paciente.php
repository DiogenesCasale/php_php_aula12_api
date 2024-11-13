<?php
function cadastrarPaciente($nome, $leito) {
   include 'db.php';
    $codigoSQL = "INSERT INTO `pacientes` (`nome`, `leito`) VALUES (:nomepac, :leit);";
    
    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('nomemed' => $nome,'esp' => $especialidade,'crm' => $crm,'usu' => $usuario,'senh' => $senha));
        

        if($resultado){
            $conexao = null;
            return "Cadastrado Com Sucesso!";
        } else {
            $conexao = null;
            return "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        $conexao = null;
        return "Erro $e";
        }
        
}

$nome = $_GET['nome'];
$leito = $_GET['leito'];

// Chama a função para cadastrar
$IsCorrect = cadastrarPaciente($nome, $leito);

// Criar vetor resultado
$resultado = array('login' => $IsCorrect);

// Retorna $resultado em formato JSON:
echo json_encode($resultado);
?>
