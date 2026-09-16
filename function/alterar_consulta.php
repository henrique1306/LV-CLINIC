<?php
require("conexao.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_consulta = $_POST['id_consulta'];
    $id_paciente = $_POST['id_paciente'];
    $id_profissional = $_POST['id_profissional'];
    $data_consulta = $_POST['data_consulta'];
    $horario = $_POST['horario'];
    $situacao = $_POST['situacao'];


    $sql = "UPDATE consulta SET
                id_paciente = '$id_paciente',
                id_profissional = '$id_profissional',
                data_consulta = '$data_consulta',
                horario = '$horario',
                situacao = '$situacao'
                WHERE id_consulta = $id_consulta
    ";
if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}

mysqli_close($conn);


}
?>
