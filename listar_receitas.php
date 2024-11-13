<?php
function ListarReceitas() {
   include 'db.php';
   $codigoSQL = "SELECT r.id, p.nome AS paciente, r.medicamento, r.data_administracao, r.hora_administracao, p.leito 
        FROM receitas r 
        JOIN pacientes p ON r.paciente_id = p.id 
        WHERE r.id NOT IN (SELECT receita_id FROM administracoes)";
    try {
        $comando = $conexao->query($codigoSQL);
        $resultado = $comando->fetchAll();

        $resposta = '';
    
        foreach ($resultado as $resultado) {
            $resposta .= "Paciente: " . $resultado['paciente'] . "<br>";
            $resposta .= "Medicamento: " . $resultado['medicamento'] . "<br>";
            $resposta .= "Data: " . $resultado['data_administracao'] . " " . $resultado['hora_administracao'] . "<br>";
            $resposta .= "Leito: " . $resultado['leito'] . "<br>";
            $resposta .= "<a href='registrar_administracao.php?receita_id=" . $resultado['id'] . "'>Registrar Administração</a><br><br>";
        }
        

        if($resultado){
            $conexao = null;
            return $resposta;
        } else {
            $conexao = null;
            return "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        $conexao = null;
        return "Erro $e";
        }
        
}

// Chama a função para cadastrar
$IsCorrect = ListarReceitas();

// Criar vetor resultado
$resultado = array('login' => $IsCorrect);

// Retorna $resultado em formato JSON:
echo json_encode($resultado);
?>
