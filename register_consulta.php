<?php
include("./function/conexao.php"); 
$query_pacientes = mysqli_query($conn, "SELECT id_paciente, nome FROM paciente");

 $query_medicos = mysqli_query($conn, "SELECT id_profissional, nome FROM profissional");
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINIC+ - Agendar Consulta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./src/styles/styles.css">
</head>

<body>
    
    <?php include("./src/styles/navbar.php"); ?>


    <main id="contet">
        <section>
            <h2 class="section-title">Cadastros</h2>
             <h3 class="section-subtitle">Agendar Nova Consulta</h3> 
            <div id="forms">
                <div id="form">
                    <h2 class="section-title" id="cad_header">Novo Registro</h2>

                    <form action="./function/inserir_consulta.php" method="post">
                        
                        <div class="form-group">
                            <label for="inputPaciente">Nome do Paciente</label>
                             <input type="text" class="form-control" list="lista_pacientes" id="inputPaciente" placeholder="Digite para buscar paciente..." autocomplete="off" required>
                            
                             <input type="hidden" name="id_paciente" id="id_paciente" required>
                            
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
                            <label for="inputMedico">Nome do Médico</label>
                            <input type="text" class="form-control" list="lista_medicos" id="inputMedico" placeholder="Digite para buscar médico..." autocomplete="off" required>
                            
                             <input type="hidden" name="id_profissional" id="id_profissional" required>
                            
                            <datalist id="lista_medicos">
                                <?php
                                    if(mysqli_num_rows($query_medicos) > 0){
                                        while($row = mysqli_fetch_assoc($query_medicos)){
                                            echo "<option data-id='".$row['id_profissional']."' value='".$row['nome']."'></option>";
                                        }
                                    }
                                ?>
                            </datalist>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEspecialidade4">Data da Consulta</label>
                                <input type="date" class="form-control" id="inputDataConsulta" name="data_consulta" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputHorario4">Horário</label>
                                <input type="time" class="form-control" id="inputHorario4" name="horario"  required>
                            </div>
            
                        </div>
                        <input type="hidden" name="situacao" value="agendada">
                    
                        
                        
                        <button type="submit" class="btn btn-primary">Agendar</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- SCRIPT PARA CAPTURAR OS IDs AUTOMATICAMENTE -->
    <script>
        function mapearIdDatalist(inputId, hiddenId, datalistId) {
            const input = document.getElementById(inputId);
            const hidden = document.getElementById(hiddenId);
            const list = document.getElementById(datalistId);

            input.addEventListener('input', function() {
                const options = list.options;
                hidden.value = ""; // Limpa o ID caso o usuário mude o nome

                for (let i = 0; i < options.length; i++) {
                    // Se o nome digitado/selecionado for exatamente igual a uma das opções
                    if (options[i].value === input.value) {
                        // Passa o data-id para o campo oculto que vai pro PHP
                        hidden.value = options[i].getAttribute('data-id');
                        break;
                    }
                }
            });
        }

        // Ativa a função para Pacientes e Médicos
        mapearIdDatalist('inputPaciente', 'id_paciente', 'lista_pacientes');
        mapearIdDatalist('inputMedico', 'id_profissional', 'lista_medicos');
    </script>

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