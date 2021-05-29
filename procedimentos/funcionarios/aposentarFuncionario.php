<?php
require_once "../../classes/conexao.php";
require_once "../../classes/funcionarios.php";

$idFuncionario = $_POST['idFuncionarioAposentadoria'];
$respAposentadoria = $_POST['txtRespostaAposentadoria'];

$obj = new Funcionarios();

$dados = array(
    $idFuncionario,
    $respAposentadoria
);

echo $obj->aposentarFuncionario($dados);