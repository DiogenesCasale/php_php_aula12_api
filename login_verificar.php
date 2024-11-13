<?php
session_start();
include 'db.php';


$senha = $_POST['senha'];

$codigoSQL = "SELECT * FROM `medicos` WHERE `usuario` LIKE :usu";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('usu' => $_POST['usuario']));
    
    if($resultado){
        $medico = $comando->fetch();
            if ($senha == $medico['senha']) {
                $_SESSION['medico_id'] = $medico['id'];
                echo "médico {$medico['nome']} logado com sucesso no sistema";
                echo "<a href='cadastro_paciente.php'><button>Cadastrar Paciente</button></a>";
                echo "<a href='cadastro_receita.php'><button>Cadastrar Receitas</button></a>";
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
} catch (Exception $e) {
    echo "Erro $e";  
}
    $conexao = null;

?>
