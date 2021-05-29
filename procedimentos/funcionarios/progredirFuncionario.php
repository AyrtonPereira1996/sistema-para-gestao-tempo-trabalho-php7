<?php
require_once "../../classes/conexao.php";
require_once "../../classes/funcionarios.php";

$idFuncionario = $_POST['idFuncionarioProgressao'];
$escalaoFuncionario = $_POST['txtEscalaoActualizacao'];

$obj = new Funcionarios();

$dados = array(
    $idFuncionario,
    $escalaoFuncionario
);

echo $obj->progredirFuncionario($dados);
