<?php
require("conexao.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_profissional = $_POST['id_profissional'];
    $nome = $_POST['nome'];
    $especialidade = $_POST['especilidade'];
    $crm = $_POST['crm'];
    $valor_consulta = $_POST['valor_consulta'];

    $sql = "UPDATE profissional SET
                nome = '$nome',
                especialidade = '$especialidade',
                crm = '$crm',
                valor_consulta = '$valor_consulta'
                WHERE id_profissional = $id_profissional
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
