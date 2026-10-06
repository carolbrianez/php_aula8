<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "teste2";

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$nome = $_GET['nome'];
$email = $_GET['email'];

$comando = "SELECT `nome`, `email` FROM `usuarios` WHERE `nome` = '$nome' AND `email` = '$email'";

$stm = $conexao->prepare($comando);
$stm->execute();

if(($resultado = $stm->fetch(PDO::FETCH_ASSOC)) !== false) {
    $_SESSION['nome'] = $resultado['nome'];
    echo "Logado com sucesso";
} else{
    echo "Usuario incorreto";
}

$conexao = null;
?>