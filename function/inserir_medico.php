<?php
include("conexao.php");

$crm = $_POST['crm'];
$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$valor_consulta = $_POST['valor_consulta'];


$sql = "INSERT INTO profissional (crm, nome, especialidade, valor_consulta)
             VALUES ('$crm', '$nome','$especialidade','$valor_consulta')";

if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}



?>