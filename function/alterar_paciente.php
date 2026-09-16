<?php
require("conexao.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_paciente = $_POST['id_paciente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];


    $sql = "UPDATE paciente SET
                nome = '$nome',
                email = '$email',
                cpf = '$cpf',
                data_nascimento = '$data_nascimento',
                telefone = '$telefone'
                WHERE id_paciente = $id_paciente
    ";
if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}


}
?>
