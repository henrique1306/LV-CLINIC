<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINIC+ - Paciente - Listagem</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
    
        <?php include("./src/styles/navbar.php"); ?>


    </header>
    <main id="contet">
        <section>
            <h2 class="section-title">Consultas - Listagem</h2>
            <h3 class="section-subtitle">Listagem De Consultas</h3>
            <div id="table">
                <?php
                require("./function/conexao.php");
               
                $sql = mysqli_query($conn, "SELECT c.id_consulta AS id_consulta, p.nome AS nome_paciente, pf.nome AS nome_profissional, DATE_FORMAT(c.data_consulta, '%d/%m/%Y') AS data_consulta, c.horario AS horario, c.situacao AS situacao
                 FROM consulta c
                 inner join paciente p on p.id_paciente = c.id_paciente
                 inner join profissional pf on c.id_profissional = pf.id_profissional
                 ") 
                 or die(mysqli_error($conn));

                echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>ID</th>";
                echo "<th scope='col'>NOME PACIENTE</th>";
                echo "<th scope='col'>NOME PROFISSIONAL</th>";
                echo "<th scope='col'>DATA</th>";
                echo "<th scope='col'>HORA</th>";
                echo "<th scope='col'>SITUAÇÃO</th>";
                echo "<th scope='col'>DELETAR</th>";
                echo "<th scope='col'>ALTERAR</th>";
                echo "<th scope='col'>ATENDIMENTO</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($reg = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $reg["id_consulta"] . "</td>";
                    echo "<td>" . $reg["nome_paciente"] . "</td>";
                    echo "<td>" . $reg["nome_profissional"] . "</td>";
                    echo "<td>" . $reg["data_consulta"] . "</td>";
                    echo "<td>" . $reg["horario"] . "</td>";
                    echo "<td>" . $reg["situacao"] . "</td>";
                    echo "<td> 
                                <form action = './function/deletar_consulta.php' method = 'post'> 
                                    <input type = 'hidden' name = 'id_consulta' id= 'form_text' value = '" . $reg["id_consulta"] . "'>
                                    <button type='submit' class='btn btn-danger'>Deletar</button> 
                                </form> 
                            </td>";
                    echo "<td> 
                            <form action = './alterar_consulta.php' method = 'get'> 
                                <input type = 'hidden' name = 'id_consulta' id= 'form_text' value = '" . $reg["id_consulta"] . "'>
                                <button type='submit' class='btn btn-warning'>Alterar</button>
                             </form> 
                        </td>";

                         echo "<td> 
                            <form action='./alterar_atendimento.php' method='get'> 
                                <input type='hidden' name='id_consulta' value='" . $reg["id_consulta"] . "'>
                                <button type='submit' class='btn btn-info'>Atendimento</button>
                             </form> 
                          </td>";

                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                mysqli_close($conn);
                ?>
            </div>
        </section>
    </main>
</body>
<footer class="footering">
    <img src="/src/images/wave.svg" alt="">
    <div id="footer-items">
        <span id="copyrigth"> &copy 2026 LunarVoid</span>

        <div class="social-media-buttons">
            <a href="">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-facebook"></i>
            </a>
        </div>

    </div>

</footer>

</html>