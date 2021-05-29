<?php
require_once "../../classes/conexao.php";
require_once "../../classes/departamentos.php";

$obj = new Departamentos();

$idChefiaDepartamento = $_POST['txtIdChefiaDepartamento'];
$idFuncionarioChefiaActual = $_POST['txtFuncionarioChefia'];

$dados = array(
    $idChefiaDepartamento,
    $idFuncionarioChefiaActual
);


echo $obj->editarChefiaDepartamento($dados);
