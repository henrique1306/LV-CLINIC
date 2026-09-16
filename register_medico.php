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
            <h3 class="section-subtitle">Realizar Cadastro de Profissional</h3>
            <div id="forms">
                <div id="form">
                    <h2 class="section-title" id="cad_header">Novo Registro</h2>

                    <form action="./function/inserir.php" method="post">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input type="text" class="form-control" id="inputName" placeholder="João Silva" name="nome">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Especialidade</label>
                                <input type="text" class="form-control" id="inputEspecialidade4" placeholder="Especialidade"
                                    name="especialidade">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCpf4">CRM</label>
                                <input type="text" class="form-control" id="inputCrm4" placeholder="CRM" name="crm">
                            </div>

                           
                            <div class="form-group col-md-6">
                                <label for="inputIdentidade4">Valor da Consulta</label>
                                <input type="number" class="form-control" id="inputValorConsulta4" placeholder="R$ 00,00"
                                    name="valor_consulta">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enviar</button>
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