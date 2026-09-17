<?php

function podeCancelarConsulta(?array $consulta, DateTimeImmutable $agora): array
{
    if ($consulta === null) {
        return [
            'permitido' => false,
            'mensagem' => 'Consulta inexistente.'
        ];
    }

    $situacao = strtolower(trim((string) ($consulta['situacao'] ?? '')));
    if ($situacao === 'cancelada') {
        return [
            'permitido' => false,
            'mensagem' => 'Consulta já cancelada.'
        ];
    }

    $dataConsulta = $consulta['data_consulta'] ?? null;
    $horario = $consulta['horario'] ?? null;

    if ($dataConsulta === null || $horario === null || $dataConsulta === '' || $horario === '') {
        return [
            'permitido' => false,
            'mensagem' => 'Dados da consulta inválidos.'
        ];
    }

    try {
        $dataHoraConsulta = new DateTimeImmutable($dataConsulta . ' ' . $horario);
    } catch (Exception $e) {
        return [
            'permitido' => false,
            'mensagem' => 'Data e hora da consulta inválidas.'
        ];
    }

    $intervaloEmSegundos = $dataHoraConsulta->getTimestamp() - $agora->getTimestamp();
    $limite = 2 * 60 * 60;

    if ($intervaloEmSegundos < 0) {
        return [
            'permitido' => false,
            'mensagem' => 'Consulta já realizada ou em andamento.'
        ];
    }

    if ($intervaloEmSegundos >= $limite) {
        return [
            'permitido' => true,
            'mensagem' => 'Cancelamento permitido.'
        ];
    }

    return [
        'permitido' => false,
        'mensagem' => 'Cancelamento permitido somente com no mínimo 2 horas de antecedência.'
    ];
}

function cancelarConsultaPorId(mysqli $conn, int $idConsulta, DateTimeImmutable $agora): array
{
    $resultadoConsulta = mysqli_query($conn, "SELECT * FROM consulta WHERE id_consulta = '$idConsulta'");

    if (!$resultadoConsulta || mysqli_num_rows($resultadoConsulta) === 0) {
        return [
            'permitido' => false,
            'mensagem' => 'Consulta inexistente.'
        ];
    }

    $consulta = mysqli_fetch_assoc($resultadoConsulta);
    $validacao = podeCancelarConsulta($consulta, $agora);

    if (!$validacao['permitido']) {
        return $validacao;
    }

    $sql = "UPDATE consulta SET situacao = 'Cancelada' WHERE id_consulta = '$idConsulta'";
    if (!mysqli_query($conn, $sql)) {
        return [
            'permitido' => false,
            'mensagem' => mysqli_error($conn)
        ];
    }

    return [
        'permitido' => true,
        'mensagem' => 'Cancelamento realizado com sucesso.'
    ];
}
