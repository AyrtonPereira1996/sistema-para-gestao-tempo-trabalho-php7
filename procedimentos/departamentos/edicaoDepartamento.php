<?php
require_once "../../classes/conexao.php";
require_once "../../classes/departamentos.php";

$obj = new Departamentos();

$idDepartamento = $_POST['txtIdDepartamentoEdicao'];
$nomeDepartamento = $_POST['txtNomeDepartamentoEdicao'];

$dados = array(
    $idDepartamento,
    $nomeDepartamento
);

echo $obj->editarDepartamento($dados);