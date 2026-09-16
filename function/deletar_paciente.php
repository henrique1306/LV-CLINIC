<?php

include("conexao.php");
$id_paciente = $_POST['id_paciente'];


if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}
?>