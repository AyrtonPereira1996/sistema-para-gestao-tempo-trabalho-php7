<?php
require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";

$con = new Conexao();
$conexao = $con -> conectar();

$idUsuario = $_POST['idUsuario'];
$obj = new Usuarios();


echo $obj->excluirUsuario($idUsuario);
