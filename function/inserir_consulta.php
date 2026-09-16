<?php
include("conexao.php");

$id_paciente = $_POST['id_paciente'];
$id_profissional = $_POST['id_profissional'];
$data_consulta = $_POST['data_consulta'];
$horario = $_POST['horario'];
$situacao = $_POST['situacao'];


$sql = "INSERT INTO consulta (id_paciente, id_profissional, data_consulta, horario, situacao)
             VALUES ('$id_paciente', '$id_profissional', '$data_consulta','$horario','$situacao')";
             

if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}



?>