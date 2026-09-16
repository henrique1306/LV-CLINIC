<?php
require("./function/conexao.php");
$id_profissional = $_GET['id_profissional'];
$sql = mysqli_query($conn, "SELECT * FROM profissional WHERE id_profissional = $id_profissional");
$profissional = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINIC+ - Cadastros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
    
       <?php include("./src/styles/navbar.php"); ?>

    <main id="contet">
        <section>
            <h2 class="section-title">Cadastros</h2>
            <h3 class="section-subtitle">Alterar Cadastro de Profissional</h3>
            <div id="forms">
                <div id="form">
                    <h2 class="section-title" id="cad_header">Alterar Registro</h2>

                    <form action="./function/alterar_medico.php" method="post">
                        <input type="hidden" name="id_profissional" value="<?= $profissional['id_profissional'] ?>">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input type="text" class="form-control" id="inputName" name="nome" value="<?= $profissional['nome']?>" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Especialidade</label>
                                <input type="text" class="form-control" id="inputEspecialidade4" name="especialidade" value="<?= $profissional['especialidade']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCpf4">CRM</label>
                                <input type="text" class="form-control" id="inputCrm4" name="crm" value="<?= $profissional['crm']?>" required>
                            </div>

                           
                            <div class="form-group col-md-6">
                                <label for="inputIdentidade4">Valor da Consulta</label>
                                <input type="number" class="form-control" id="inputValorConsulta4" name="valor_consulta" value="<?= $profissional['valor_consulta']?>" required>
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