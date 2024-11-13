<?php
function cadastrarMedico($nome, $especialidade, $crm, $usuario, $senha) {
   include 'db.php';
    $codigoSQL = "INSERT INTO `medicos` (`nome`, `especialidade`, `crm`, `usuario`, `senha`) VALUES (:nomemed, :esp, :crm, :usu, :senh);";
    
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
$especialidade = $_GET['especialidade'];
$crm = $_GET['crm'];
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];

// Chama a função para cadastrar
$IsCorrect = cadastrarMedico($nome, $especialidade, $crm, $usuario, $senha);

// Criar vetor resultado
$resultado = array('login' => $IsCorrect);

// Retorna $resultado em formato JSON:
echo json_encode($resultado);
?>
