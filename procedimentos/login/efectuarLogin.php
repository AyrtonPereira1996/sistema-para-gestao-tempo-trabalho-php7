<?php

require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";

$obj = new Usuarios();

$email = $_POST['username'];
$senha = $_POST['password'];

$dados = array($email, $senha);

echo $obj->efectuarLogin($dados);