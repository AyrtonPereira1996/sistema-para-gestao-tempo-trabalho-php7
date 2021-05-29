<?php
require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";

$idUsuario = $_POST['txtIdUsuario'];
$userRole = $_POST['txtTipoUsuario']; 

$con = new Conexao();
$conexao = $con->conectar();

$obj = new Usuarios();

$dados = array(
    $idUsuario,
    $userRole
);

echo $obj->editarUsuario($dados);

