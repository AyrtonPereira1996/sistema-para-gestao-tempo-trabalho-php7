<?php
require_once "../../classes/conexao.php";
require_once "../../classes/departamentos.php";

$idDepartamento = $_POST['txtNomeDepartamento'];
$idFuncionario = $_POST['txtNomeChefe'];

$con = new Conexao();
$conexao = $con->conectar();
$obj = new Departamentos();

$dados= array(
    $idDepartamento,
    $idFuncionario
);

echo $obj->adicionarChefeDepartamento($dados);
