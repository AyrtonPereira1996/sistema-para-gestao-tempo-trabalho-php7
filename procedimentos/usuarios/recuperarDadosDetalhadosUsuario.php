<?php

require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";

$idusuario = $_POST['idUsuario'];
$con = new Conexao();
$conectar = $con->conectar();

$obj = new Usuarios();

echo json_encode($obj->recuperarDadosDetalhadosUsuario($idusuario));