<?php
require_once "../../classes/conexao.php";
require_once "../../classes/funcionarios.php";

$con = new Conexao();
$conexao = $con->conectar();

$obj = new Funcionarios();

$idFuncionario = $_POST['idFuncionario'];

echo json_encode($obj->recuperarDadosFuncionario($idFuncionario));






