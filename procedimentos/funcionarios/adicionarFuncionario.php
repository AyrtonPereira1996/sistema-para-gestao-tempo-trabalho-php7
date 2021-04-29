<?php
ini_set('display_errors', 1);
require_once "../../classes/conexao.php";
require_once "../../classes/funcionarios.php";

$obj = new Funcionarios();
$nomeFuncionario = $_POST['txtNomeFuncionario'];
$dataNascimentoFormulario = $_POST['txtDate'];
$nuit = $_POST['txtNUIT'];
$bi = $_POST['txtBI'];
$departamento = $_POST['txtDepartamento'];
$escalao = $_POST['txtEscalao'];
$classe = $_POST['txtClasse'];
$cargo = $_POST['txtCargo'];
$dataInicioCarreiraFormulario = $_POST['txtDataInicioCarreira'];
$dataRegisto = date("Y-m-d");

$dataNascimento = implode("-", array_reverse(explode("/", $dataNascimentoFormulario)));
$dataInicioCarreira = implode("-", array_reverse(explode("/", $dataInicioCarreiraFormulario)));



$dados = array($departamento, $nomeFuncionario, $dataNascimento, $nuit, $bi, $escalao, $classe, $cargo, $dataInicioCarreira, $dataRegisto);

echo $obj->adicionarFuncionario($dados);
