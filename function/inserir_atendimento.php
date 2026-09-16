<?php
require("conexao.php");

$id_consulta = $_POST['id_consulta'];
$descricao = $_POST['descricao'];
$diagnostico = $_POST['diagnostico'];
$observacoes = $_POST['observacoes'];

$sql = "INSERT INTO atendimento (id_consulta, descricao, diagnostico, observacoes) 
        VALUES ('$id_consulta', '$descricao', '$diagnostico', '$observacoes')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../atendimentos_list.php");
} else {
    echo "Erro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>