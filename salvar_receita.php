<?php

include 'db.php';

$codigoSQL0 = "SELECT `id` FROM `pacientes` WHERE `nome` LIKE :nomepaciente";
$comando0 = $conexao->prepare($codigoSQL0);
$resultado0 = $comando0->execute(array('nomepaciente' => $_POST['nome_paciente']));
$pegarid = $comando0->fetch();

$codigoSQL = "INSERT INTO `receitas` (`paciente_id`, `medicamento`, `data_administracao`, `hora_administracao`, `dose`) VALUES (:paci_id, :rem, :date_adm, :hora_adm, :qntd);";

    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('paci_id' => $pegarid['id'],'rem' => $_POST['medicamento'],'date_adm' => $_POST['data_administracao'],'hora_adm' => $_POST['hora_administracao'],'qntd' => $_POST['dose']));
        

        if($resultado){
            echo "Receita Cadastrado Com Sucesso!";
            echo "<a href='login_enfermeiro.php'><button>Lista Receitas Pendentes</button></a>";
            echo "<br>";
        } else {
            echo "Paciente não encontrado. Cadastre o paciente primeiro.";
        }
    } catch (Exception $e) {
        echo "Erro $e";
        }
        
        $conexao = null;
?>