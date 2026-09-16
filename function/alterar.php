<<?php 
include("conexao.php");

$nome = $_POST['nome'];
$nome_Mae = $_POST['nome_Mae'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$identidade = $_POST['identidade'];
$endereco = $_POST['endereco'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];

$sql="ALTER TABLE pessoas modify(nome, nome_Mae, email, cpf, data, identidade, endereco, complemento, cidade, estado, cep)  VALUES ('$nome', '$nome_Mae','$email','$cpf','$data', '$identidade', '$endereco', '$complemento', '$cidade', '$estado', '$cep')";
?>