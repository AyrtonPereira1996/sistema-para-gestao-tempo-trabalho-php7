<?php
ini_set('display_errors', 1);
require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";

$objUsuarios = new Usuarios(); 

$idRole = $_POST['txtUserRole'];
$idFuncionario = $_POST['txtFuncionarioUsuario'];
$emailFuncionario = $_POST['txtEmail'];
$senha = $_POST['txtSenha'];

$senhaCriptografada = sha1($senha);

$dados = array(
    $idRole,
    $idFuncionario,
    $emailFuncionario,
    $senhaCriptografada
);

echo $objUsuarios->adicionarUsuario($dados);

