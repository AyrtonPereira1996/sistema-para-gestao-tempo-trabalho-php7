<?php
require_once "../../classes/conexao.php";
require_once "../../classes/funcionarios.php";

$obj = new Funcionarios();
$idFuncionario = $_POST['idFuncionario'];

echo $obj->excluirFuncionario($idFuncionario);