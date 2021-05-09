<?php
require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";

$idUsuario = $_POST['idUsuario'];

$con = new Conexao();
$conexao = $con->conectar();

$obj = new Usuarios();

echo json_encode($obj->recuperarDadosEdicaoUsuario($idUsuario));
