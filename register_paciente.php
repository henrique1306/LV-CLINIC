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
            <h3 class="section-subtitle">Realizar Cadastro de Paciente</h3>
            <div id="forms">
                <div id="form">
                    <h2 class="section-title" id="cad_header">Novo Registro</h2>

                    <form action="./function/inserir_paciente.php" method="post">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input type="text" class="form-control" id="inputName" placeholder="João Silva" name="nome">
                        </div>
                      
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email"
                                    name="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCpf4">CPF</label>
                                <input type="text" class="form-control" id="inputCpf4" placeholder="CPF" name="cpf">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputDate4">Data De Nascimento</label>
                                <input type="date" class="form-control" id="inputDate4" placeholder="Data de Nascimento"
                                    name="data_nascimento">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputIdentidade4">Telefone</label>
                                <input type="text" class="form-control" id="inputTelefone4" placeholder="(94) 3434-2424"
                                    name="telefone">
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