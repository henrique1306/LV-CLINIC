<?php
require("./function/conexao.php");

$id_paciente = isset($_GET['id_paciente']) ? $_GET['id_paciente'] : null;

if (!$id_paciente) {
    echo "<script>alert('Nenhum paciente selecionado!'); window.location.href='./person_list.php';</script>";
    exit;
}

$query_paciente = mysqli_query($conn, "SELECT nome FROM paciente WHERE id_paciente = '$id_paciente'");
$paciente_dados = mysqli_fetch_assoc($query_paciente);
$nome_paciente = $paciente_dados ? $paciente_dados['nome'] : 'Desconhecido';

$query_atendimentos = mysqli_query($conn, "SELECT a.id_atendimento, a.descricao, a.diagnostico, a.observacoes, pf.nome AS nome_profissional, DATE_FORMAT(c.data_consulta, '%d/%m/%Y') AS data_formatada
    FROM atendimento a
    INNER JOIN consulta c ON a.id_consulta = c.id_consulta
    INNER JOIN profissional pf ON c.id_profissional = c.id_profissional
    WHERE c.id_paciente = '$id_paciente'
    ORDER BY c.data_consulta DESC") or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINIC+ - Histórico de Atendimentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
        
    <?php include("./src/styles/navbar.php"); ?>


    <main id="contet">
        <section>
            <h2 class="section-title">Histórico Médico</h2>
            <h3 class="section-subtitle">Atendimentos de: <strong><?php echo $nome_paciente; ?></strong></h3>
            <div id="table">
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>DATA</th>
                            <th scope='col'>PROFISSIONAL</th>
                            <th scope='col'>DESCRIÇÃO</th>
                            <th scope='col'>DIAGNÓSTICO</th>
                            <th scope='col'>OBSERVAÇÕES</th>
                            <th scope='col'>DELETAR</th>
                            <th scope='col'>ALTERAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_atendimentos) > 0) {
                            while ($reg = mysqli_fetch_assoc($query_atendimentos)) {
                                echo "<tr>";
                                echo "<td>" . $reg["id_atendimento"] . "</td>";
                                echo "<td>" . $reg["data_formatada"] . "</td>";
                                echo "<td>" . $reg["nome_profissional"] . "</td>";
                                echo "<td>" . $reg["descricao"] . "</td>";
                                echo "<td>" . $reg["diagnostico"] . "</td>";
                                echo "<td>" . $reg["observacoes"] . "</td>";
                                
                                echo "<td> 
                                        <form action='./function/deletar_atendimento.php' method='post'> 
                                            <input type='hidden' name='id_atendimento' value='" . $reg["id_atendimento"] . "'>
                                            <input type='hidden' name='id_paciente' value='" . $id_paciente . "'>
                                            <button type='submit' class='btn btn-danger'>Deletar</button> 
                                        </form> 
                                      </td>";
                                      
                                echo "<td> 
                                        <form action='./alterar_atendimento.php' method='get'> 
                                            <input type='hidden' name='id_atendimento' value='" . $reg["id_atendimento"] . "'>
                                            <button type='submit' class='btn btn-warning'>Alterar</button>
                                         </form> 
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' style='text-align: center;'>Nenhum atendimento registrado para este paciente.</td></tr>";
                        }
                        
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
                <br>
                <!-- Botão para voltar à listagem de pacientes -->
                <a href="./listagem_paciente.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 15px; color: white; background-color: #007bff; border-radius: 5px;">Voltar para Pacientes</a>
            </div>
        </section>
    </main>

    <footer class="footering">
        <img src="./src/images/wave.svg" alt="">
        <div id="footer-items">
            <span id="copyrigth"> &copy 2026 LunarVoid</span>

            <div class="social-media-buttons">
                <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>