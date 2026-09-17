<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/images/favicon.ico" type="image/x-icon">
    <title>CLINIC+ - Paciente - Listagem</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
    
        <?php include("./src/styles/navbar.php"); ?>

    <main id="contet">
        <section>
            <h2 class="section-title">Cadastros - Profissionais Listagem</h2>
            <h3 class="section-subtitle">Listagem De Profissionais Cadastrados</h3>
            <div id="table">
                <?php
                require("./function/conexao.php");
               
                $sql = mysqli_query($conn, "SELECT * FROM profissional") or die(mysqli_error($conn));

                echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>ID</th>";
                echo "<th scope='col'>NOME</th>";
                echo "<th scope='col'>CRM</th>";
                echo "<th scope='col'>ESPECIALIDADE</th>";
                echo "<th scope='col'>VALOR DA CONSULTA</th>";
                echo "<th scope='col'>DELETAR</th>";
                echo "<th scope='col'>ALTERAR</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($reg = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $reg["id_profissional"] . "</td>";
                    echo "<td>" . $reg["nome"] . "</td>";
                    echo "<td>" . $reg["crm"] . "</td>";
                    echo "<td>" . $reg["especialidade"] . "</td>";
                    echo "<td>" . $reg["valor_consulta"] . "</td>";
                    echo "<td> 
                                <form action = './function/deletar_medico.php' method = 'post'> 
                                    <input type = 'hidden' name = 'id_profissional' id= 'form_text' value = '" . $reg["id_profissional"] . "'>
                                    <button type='submit' class='btn btn-danger'>Deletar</button> 
                                </form> 
                            </td>";
                    echo "<td> 
                            <form action = './alterar_medico.php' method = 'get'> 
                                <input type = 'hidden' name = 'id_profissional' id= 'form_text' value = '" . $reg["id_profissional"] . "'>
                                <button type='submit' class='btn btn-warning'>Alterar</button>
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