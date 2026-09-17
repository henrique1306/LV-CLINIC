<?php

require __DIR__ . '/../function/consulta_cancelamento.php';

function assertCancelamento(bool $esperado, ?array $consulta, string $descricao, DateTimeImmutable $agora): void
{
    $resultado = podeCancelarConsulta($consulta, $agora);

    if ($resultado['permitido'] !== $esperado) {
        throw new RuntimeException(
            $descricao . ' - esperado ' . ($esperado ? 'permitido' : 'negado') .
            ', mas retornou ' . ($resultado['permitido'] ? 'permitido' : 'negado') .
            ': ' . ($resultado['mensagem'] ?? '')
        );
    }
}

$agora = new DateTimeImmutable('2026-09-16 10:00:00');

assertCancelamento(true, [
    'id_consulta' => 1,
    'situacao' => 'Agendada',
    'data_consulta' => '2026-09-16',
    'horario' => '14:00:00'
], 'cancelamento permitido', $agora);

assertCancelamento(true, [
    'id_consulta' => 2,
    'situacao' => 'Agendada',
    'data_consulta' => '2026-09-16',
    'horario' => '12:00:00'
], 'cancelamento exatamente 2 horas antes', $agora);

assertCancelamento(false, [
    'id_consulta' => 3,
    'situacao' => 'Agendada',
    'data_consulta' => '2026-09-16',
    'horario' => '11:30:00'
], 'cancelamento com menos de 2 horas', $agora);

assertCancelamento(false, [
    'id_consulta' => 4,
    'situacao' => 'Cancelada',
    'data_consulta' => '2026-09-16',
    'horario' => '15:00:00'
], 'consulta ja cancelada', $agora);

assertCancelamento(false, null, 'consulta inexistente', $agora);

echo "Todos os testes de cancelamento passaram.\n";
