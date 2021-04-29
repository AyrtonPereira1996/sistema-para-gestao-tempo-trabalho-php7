<?php
require_once "../../classes/conexao.php";
require_once "../../classes/departamentos.php";

$obj= new Departamentos();

$nomeDepartamento = $_POST['txtDepartamento'];

$dados = [$nomeDepartamento];

echo $obj->adicionarDepartamento($dados);





