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

    <main id="contet">
        <section>
            <h2 class="section-title">Cadastros - Pacientes Listagem</h2>
            <h3 class="section-subtitle">Listagem De Pacientes Cadastrados</h3>
            <div id="table">
                <?php
                require("./function/conexao.php");
               
                $sql = mysqli_query($conn, "SELECT id_paciente, nome, cpf, email, DATE_FORMAT(data_nascimento,'%d/%m/%Y' ) AS data_nascimento, telefone FROM paciente") or die(mysqli_error($conn));

                echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>ID</th>";
                echo "<th scope='col'>NOME</th>";
                echo "<th scope='col'>CPF</th>";
                echo "<th scope='col'>EMAIL</th>";
                echo "<th scope='col'>DATA DE NASCIMENTO</th>";
                echo "<th scope='col'>TELEFONE</th>";
                echo "<th scope='col'>DELETAR</th>";
                echo "<th scope='col'>ALTERAR</th>";
                echo "<th scope='col'>ATENDIMENTOS</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($reg = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $reg["id_paciente"] . "</td>";
                    echo "<td>" . $reg["nome"] . "</td>";
                    echo "<td>" . $reg["cpf"] . "</td>";
                    echo "<td>" . $reg["email"] . "</td>";
                    echo "<td>" . $reg["data_nascimento"] . "</td>";
                    echo "<td>" . $reg["telefone"] . "</td>";
                    echo "<td> 
                                <form action = './function/deletar_paciente.php' method = 'post'> 
                                    <input type = 'hidden' name = 'id_paciente' id= 'form_text' value = '" . $reg["id_paciente"] . "'>
                                    <button type='submit' class='btn btn-danger'>Deletar</button> 
                                </form> 
                            </td>";
                    echo "<td> 
                            <form action = './alterar_paciente.php' method = 'get'> 
                                <input type = 'hidden' name = 'id_paciente' id= 'form_text' value = '" . $reg["id_paciente"] . "'>
                                <button type='submit' class='btn btn-warning'>Alterar</button>
                             </form> 
                        </td>";

                        echo "<td> 
                            <form action='./listagem_atendimentos.php' method='get'> 
                                <input type='hidden' name='id_paciente' value='" . $reg["id_paciente"] . "'>
                                <button type='submit' class='btn btn-info'>Atendimentos</button>
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