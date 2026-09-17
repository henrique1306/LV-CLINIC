<?php

require("conexao.php");
require("consulta_cancelamento.php");

$id_consulta = isset($_POST['id_consulta']) ? (int) $_POST['id_consulta'] : 0;
$agora = new DateTimeImmutable('now');

if ($id_consulta <= 0) {
    header("Location: ../error.php?msg=" . urlencode('Consulta inexistente.'));
    exit();
}

$resultado = cancelarConsultaPorId($conn, $id_consulta, $agora);

if (!$resultado['permitido']) {
    header("Location: ../error.php?msg=" . urlencode($resultado['mensagem']));
    exit();
}

header("location: ../pass.php");
exit();
