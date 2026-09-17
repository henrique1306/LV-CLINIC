<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>
<header>
    <nav id="navbar">
        <i class="fa-solid fa-sun" id="nav_logo">CLINIC+</i>

        <button id="menu-toggle" aria-label="Abrir menu" aria-expanded="false" aria-controls="nav_list">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul id="nav_list">
            <li class="nav-item">
                <a href="./index.php" class="<?= $pagina_atual == 'index.php' ? 'active' : '' ?>">Início</a>
            </li>
            <li class="nav-item">
                <a href="./listagem_paciente.php" class="<?= $pagina_atual == 'listagem_paciente.php' ? 'active' : '' ?>">Pacientes</a>
            </li>
            <li class="nav-item">
                <a href="./listagem_medico.php" class="<?= $pagina_atual == 'listagem_medico.php' ? 'active' : '' ?>">Profissionais</a>
            </li>
            <li class="nav-item">
                <a href="./listagem_consulta.php" class="<?= $pagina_atual == 'listagem_consulta.php' ? 'active' : '' ?>">Consultas</a>
            </li>
            <li class="nav-item">
                <a href="./register_paciente.php" class="<?= $pagina_atual == 'register_paciente.php' ? 'active' : '' ?>">Novo Paciente</a>
            </li>
            <li class="nav-item">
                <a href="./register_medico.php" class="<?= $pagina_atual == 'register_medico.php' ? 'active' : '' ?>">Novo Profissional</a>
            </li>
            <li class="nav-item">
                <a href="./register_consulta.php" class="<?= $pagina_atual == 'register_consulta.php' ? 'active' : '' ?>">Agendar Consulta</a>
            </li>
            <li class="nav-item mobile-refresh">
                <a href="javascript:location.reload()">Atualizar</a>
            </li>
        </ul>

        <button class="btn-default"><a href="javascript:location.reload()">Atualizar</a></button>
    </nav>
</header>

<script src="./src/javascript/navbar.js" defer></script>