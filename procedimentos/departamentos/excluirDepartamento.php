<?php 
require_once "../../classes/conexao.php";
require_once "../../classes/departamentos.php";

$obj = new Departamentos();
$idDepartamento = $_POST['idDepartamento'];

echo $obj -> excluirDepartamento($idDepartamento);