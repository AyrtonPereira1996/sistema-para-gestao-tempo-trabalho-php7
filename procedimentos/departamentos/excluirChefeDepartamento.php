<?php
require_once "../../classes/conexao.php";
require_once "../../classes/departamentos.php";

$idChefiaDepartamento = $_POST['idChefiaDepartamento'];

$obj = new Departamentos();

echo $obj->excluirChefeDepartamento($idChefiaDepartamento);