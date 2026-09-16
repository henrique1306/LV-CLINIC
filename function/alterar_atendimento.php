<?php
require("conexao.php");

$id_atendimento = $_POST['id_atendimento'];
$id_consulta = $_POST['id_consulta'];
$descricao = $_POST['descricao'];
$diagnostico = $_POST['diagnostico'];
$observacoes = $_POST['observacoes'];

$sql = "UPDATE atendimento SET 
        id_consulta = '$id_consulta',
        descricao = '$descricao',
        diagnostico = '$diagnostico',
        observacoes = '$observacoes'
        WHERE id_atendimento = '$id_atendimento'";

if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}

mysqli_close($conn);
?>