<?php
require("./function/conexao.php");

 $id_consulta = isset($_GET['id_consulta']) ? $_GET['id_consulta'] : '';
$id_atendimento = isset($_GET['id_atendimento']) ? $_GET['id_atendimento'] : '';
$dados = null;

 if ($id_consulta && !$id_atendimento) {
    $check = mysqli_query($conn, "SELECT id_atendimento FROM atendimento WHERE id_consulta = '$id_consulta'");
    if ($check && mysqli_num_rows($check) > 0) {
         $row = mysqli_fetch_assoc($check);
        $id_atendimento = $row['id_atendimento'];
    }
}

 if ($id_atendimento) {
    $query = mysqli_query($conn, "SELECT * FROM atendimento WHERE id_atendimento = '$id_atendimento'");
    if ($query && mysqli_num_rows($query) > 0) {
        $dados = mysqli_fetch_assoc($query);
        $id_consulta = $dados['id_consulta']; 
    }
}
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINIC+ - Atendimento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
    
<?php include("./src/styles/navbar.php"); ?>

    <main id="contet">
        <section>
            <h2 class="section-title">Atendimento Médico</h2>
            <h3 class="section-subtitle">Preenchimento de Prontuário</h3> 
            
            <div id="forms">
                <div id="form">
                    <h2 class="section-title" id="cad_header">
                        <?php echo $id_atendimento ? 'Editar Atendimento' : 'Novo Atendimento'; ?>
                    </h2>

                    <form action="<?php echo $id_atendimento ? './function/alterar_atendimento.php' : './function/inserir_atendimento.php'; ?>" method="post">
                        
                        <?php if ($id_atendimento): ?>
                            <input type="hidden" name="id_atendimento" value="<?php echo $id_atendimento; ?>">
                        <?php endif; ?>
                        
                        <input type="hidden" name="id_consulta" value="<?php echo $id_consulta; ?>" required>

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?php echo $dados ? $dados['descricao'] : ''; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="diagnostico">Diagnóstico</label>
                            <input type="text" class="form-control" id="diagnostico" name="diagnostico" value="<?php echo $dados ? $dados['diagnostico'] : ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="observacoes">Observações</label>
                            <textarea class="form-control" id="observacoes" name="observacoes" rows="4"><?php echo $dados ? $dados['observacoes'] : ''; ?></textarea>
                        </div>
                        
                        <div style="display: flex; gap: 10px; margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="javascript:history.back()" class="btn btn-danger" style="text-decoration: none; text-align: center; padding: 10px 15px; border-radius: 5px;">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footering">
        <img src="./src/images/wave.svg" alt="">
        <div id="footer-items">
            <span id="copyrigth"> &copy 2026 Carlos Henrique Guedes</span>
            <div class="social-media-buttons">
                <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>