<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    die("Você não está logado. <br><a href=\"cadastrousuario.php\">Cadastrar</a> <a href=\"login.php\">Entrar</a>");
}
