<?php
require_once "../../classes/conexao.php";
require_once "../../classes/funcionarios.php";

$idFuncionario = $_POST['idFuncionarioPromocao'];
$classeFuncionario = $_POST['txtClasseActualizacao'];

$obj = new Funcionarios();

$dados = array(
    $idFuncionario,
    $classeFuncionario
);


echo $obj->promoverFuncionario($dados);