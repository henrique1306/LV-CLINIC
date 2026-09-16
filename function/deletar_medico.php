<?php

include("conexao.php");
$id_profissional = $_POST['id_profissional'];


$sql = "DELETE FROM profissional WHERE id_profissional = '$id_profissional'";

if (mysqli_query($conn, $sql)) {
    header("location: ../pass.php");
    exit();
} else {
    $erro_banco = mysqli_error($conn);
    header("Location: ../error.php?msg=" . urlencode($erro_banco));
    exit();
}
?>