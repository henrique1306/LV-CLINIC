<?php
include("./function/conexao.php"); 

$id_consulta = isset($_GET['id_consulta']) ? $_GET['id_consulta'] : null;
$consulta_dados = null;

if ($id_consulta) {
    $sql_busca = "SELECT c.*, p.nome AS nome_paciente, pf.nome AS nome_profissional 
                  FROM consulta c
                  INNER JOIN paciente p ON p.id_paciente = c.id_paciente
                  INNER JOIN profissional pf ON pf.id_profissional = c.id_profissional
                  WHERE c.id_consulta = '$id_consulta'";
    $resultado_busca = mysqli_query($conn, $sql_busca);
    
    if ($resultado_busca && mysqli_num_rows($resultado_busca) > 0) {
        $consulta_dados = mysqli_fetch_assoc($resultado_busca);
    }
}

$query_pacientes = mysqli_query($conn, "SELECT id_paciente, nome FROM paciente");
$query_profissionais = mysqli_query($conn, "SELECT id_profissional, nome FROM profissional");
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/images/favicon.ico" type="image/x-icon">
    <title>CLINIC+ - <?php echo $id_consulta ? 'Alterar Consulta' : 'Agendar Consulta'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
        <?php include("./src/styles/navbar.php"); ?>


    <main id="contet">
        <section>
            <h2 class="section-title">Cadastros</h2>
             <h3 class="section-subtitle"><?php echo $id_consulta ? 'Alterar Consulta Cadastrada' : 'Agendar Nova Consulta'; ?></h3> 
            <div id="forms">
                <div id="form">
                    <h2 class="section-title" id="cad_header"><?php echo $id_consulta ? 'Editar Registro' : 'Novo Registro'; ?></h2>

                    <form action="<?php echo $id_consulta ? './function/alterar_consulta.php' : './function/inserir_consulta.php'; ?>" method="post">
                        
                        <?php if ($id_consulta): ?>
                            <input type="hidden" name="id_consulta" value="<?php echo $consulta_dados['id_consulta']; ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="inputPaciente">Nome do Paciente</label>
                            <input type="text" class="form-control" list="lista_pacientes" id="inputPaciente" placeholder="Digite para buscar paciente..." autocomplete="off" value="<?php echo $consulta_dados ? $consulta_dados['nome_paciente'] : ''; ?>" required>
                            
                            <input type="hidden" name="id_paciente" id="id_paciente" value="<?php echo $consulta_dados ? $consulta_dados['id_paciente'] : ''; ?>" required>
                            
                            <datalist id="lista_pacientes">
                                <?php
                                    if(mysqli_num_rows($query_pacientes) > 0){
                                        while($row = mysqli_fetch_assoc($query_pacientes)){
                                            echo "<option data-id='".$row['id_paciente']."' value='".$row['nome']."'></option>";
                                        }
                                    }
                                ?>
                            </datalist>
                        </div>

                         <div class="form-group">
                            <label for="inputprofissional">Nome do Profissional</label>
                            <input type="text" class="form-control" list="lista_profissionais" id="inputprofissional" placeholder="Digite para buscar médico..." autocomplete="off" value="<?php echo $consulta_dados ? $consulta_dados['nome_profissional'] : ''; ?>" required>
                            
                            <input type="hidden" name="id_profissional" id="id_profissional" value="<?php echo $consulta_dados ? $consulta_dados['id_profissional'] : ''; ?>" required>
                            
                            <datalist id="lista_profissionais">
                                <?php
                                    if(mysqli_num_rows($query_profissionais) > 0){
                                        while($row = mysqli_fetch_assoc($query_profissionais)){
                                            echo "<option data-id='".$row['id_profissional']."' value='".$row['nome']."'></option>";
                                        }
                                    }
                                ?>
                            </datalist>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputDataConsulta">Data da Consulta</label>
                                <input type="date" class="form-control" id="inputDataConsulta" name="data_consulta" value="<?php echo $consulta_dados ? $consulta_dados['data_consulta'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputHorario4">Horário</label>
                                <input type="time" class="form-control" id="inputHorario4" name="horario" value="<?php echo $consulta_dados ? $consulta_dados['horario'] : ''; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputSituacao4">Situação</label>
                                <select id="inputSituacao4" class="form-control" name="situacao">
                                    <option <?php echo ($consulta_dados && $consulta_dados['situacao'] == 'Agendada') ? 'selected' : ''; ?>>Agendada</option>
                                    <option <?php echo ($consulta_dados && $consulta_dados['situacao'] == 'Realizada') ? 'selected' : ''; ?>>Realizada</option>
                                    <option <?php echo ($consulta_dados && $consulta_dados['situacao'] == 'Cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary"><?php echo $id_consulta ? 'Salvar Alterações' : 'Agendar'; ?></button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        function mapearIdDatalist(inputId, hiddenId, datalistId) {
            const input = document.getElementById(inputId);
            const hidden = document.getElementById(hiddenId);
            const list = document.getElementById(datalistId);

            input.addEventListener('input', function() {
                const options = list.options;
                hidden.value = ""; 

                for (let i = 0; i < options.length; i++) {
                    if (options[i].value === input.value) {
                        hidden.value = options[i].getAttribute('data-id');
                        break;
                    }
                }
            });
        }

        mapearIdDatalist('inputPaciente', 'id_paciente', 'lista_pacientes');
        mapearIdDatalist('inputprofissional', 'id_profissional', 'lista_profissionais');
    </script>
</body>
<footer>
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
</html>