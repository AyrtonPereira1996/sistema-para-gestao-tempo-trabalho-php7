<?php
require_once "../../classes/conexao.php";
require_once "../../classes/departamentos.php";

$obj = new Departamentos();
$idChefiaDepartamento = $_POST['idChefiaDepartamento'];

echo json_encode($obj->recuperarDadosEdicaoChefiaDepartamento($idChefiaDepartamento));