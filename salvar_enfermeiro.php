<?php
function cadastrarEnfermeiro($nome, $especialidade, $crm, $usuario, $senha) {
   include 'db.php';
   $codigoSQL = "INSERT INTO `enfermeiros` (`nome`, `coren`, `usuario`, `senha`) VALUES (:nomeenf, :coren, :usu, :senh);";
    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('nomeenf' => $nome,'coren' => $coren,'usu' => $usuario,'senh' => $senha));
        

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
$coren = $_GET['coren'];
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];

// Chama a função para cadastrar
$IsCorrect = cadastrarEnfermeiro($nome, $coren, $usuario, $senha);

// Criar vetor resultado
$resultado = array('login' => $IsCorrect);

// Retorna $resultado em formato JSON:
echo json_encode($resultado);
?>
