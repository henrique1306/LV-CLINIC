<?php
$mensagem_erro = isset($_GET['msg']) ? $_GET['msg'] : "Houve Uma Falha Ao Processar Sua Requisição!";
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/images/favicon.ico" type="image/x-icon">
    <title>CLINIC+ - Erro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
        <?php include("./src/styles/navbar.php"); ?>

    
    <main id="contet">
        <div class="alerts">
            <div class="alert">
                <div class="jumbotron jumbotron-fluid" id="error">
                    <div class=" container">
                        <h1 class="display-4">Erro!!</h1>
                        <p class="lead" style="color: #ffcccc; font-family: monospace;">
                            <?php echo htmlspecialchars($mensagem_erro, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="espaco"></div>
</body>
<footer>
    <img src="/src/images/wave.svg" alt="">
    <div id="footer-items">
        <span id="copyrigth"> &copy 2026 LunarVoid</span>

        <div class="social-media-buttons">
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
        </div>
    </div>
</footer>

</html>