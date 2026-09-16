<?php

include("conexao.php");
$id_consulta = $_POST['id_consulta'];


$sql = "DELETE FROM consulta WHERE id_consulta = '$id_consulta'";

if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}
?>