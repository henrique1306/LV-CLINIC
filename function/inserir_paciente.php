<?php
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$telefone = $_POST['telefone'];

$sql = "INSERT INTO paciente (nome, email, cpf, data_nascimento, telefone) 
            VALUES ('$nome','$email','$cpf','$data_nascimento', '$telefone')";

if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}


?>