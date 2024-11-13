<?php
session_start();
include 'db.php';


$senha = $_POST['senha'];

$codigoSQL = "SELECT * FROM `enfermeiros` WHERE `usuario` LIKE :usu";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('usu' => $_POST['usuario']));
    
    if($resultado){
        $enfermeiro = $comando->fetch();
            if ($senha == $enfermeiro['senha']) {
                $_SESSION['enfermeiro_id'] = $enfermeiro['id'];
                
                echo "Enfermeiro {$enfermeiro['nome']} logado com sucesso no sistema<br><br>";
                echo "<a href='cadastro_paciente.php'><button>Cadastrar Paciente</button></a><br><br>";
                echo "<a href='listar_receitas.php'><button>Administrar Receitas</button></a><br>";
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
<br>
<a href="cadastro_receita.php"><button>Cadastrar Receita</button></a> <br><br>

<a href="index.php"><button>Página Central</button></a>