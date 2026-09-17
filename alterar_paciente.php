<?php
require("./function/conexao.php");
$id_paciente = $_GET['id_paciente'];
$sql = mysqli_query($conn, "SELECT * FROM paciente WHERE id_paciente = $id_paciente");
$paciente = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/images/favicon.ico" type="image/x-icon">
    <title>CLINIC+ - Cadastros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
   
    <?php include("./src/styles/navbar.php"); ?>

    <main id="contet">
        <section>
            <h2 class="section-title">Cadastros</h2>
            <h3 class="section-subtitle">Alterar Cadastro de Paciente</h3>
            <div id="forms">
                <div id="form">
                    <h2 class="section-title" id="cad_header">Alterar Registro</h2>

                    <form action="./function/alterar_paciente.php" method="post">
                        <input type="hidden" name="id_paciente" value="<?= $paciente['id_paciente'] ?>">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input type="text" class="form-control" id="inputName" name="nome" value="<?= $paciente['nome']?>" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $paciente['email']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCpf4">cpf</label>
                                <input type="text" class="form-control" id="inputCpf4" name="cpf" value="<?= $paciente['cpf']?>" required>
                            </div>

                           
                            <div class="form-group col-md-6">
                                <label for="inputDate4">Data De Nascimento</label>
                                <input type="date" class="form-control" id="inputDataNascimento4" name="data_nascimento" value="<?= $paciente['data_nascimento']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDate4">Telefone</label>
                                <input type="text" class="form-control" id="inputTelefone4" name="telefone" value="<?= $paciente['telefone']?>" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
<footer>
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