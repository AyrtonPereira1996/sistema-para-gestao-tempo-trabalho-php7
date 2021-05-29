<?php
ini_set('display_errors', 1);
require_once "./dependencias.php";
require_once "../classes/conexao.php";

$con = new Conexao();
$conexao = $con->conectar();



?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área progressão dos funcionários | SIGETES</title>
    <?php require_once "./top-side-bar-menu.php"; ?>

</head>

<body>

    <main class="container-fluid">
        <section>
            <h1>Registos das progressões dos funcionários</h1>

            <div class="row mt-5">
                <form id="frmPesquisaFuncionario" class="frm-pesquisa">


                    <span>Pesquisa:</span>


                    <select name="" id="itemsPesquisa" class="form-select ">
                        <option value="">Escolha o campo</option>
                        <option value="codigoRegisto">Código de registo</option>
                        <option value="nomeFuncionario">Nome do funcionário</option>
                        <option value="cargo">Cargo que assume</option>
                        <option value="escalao">Escalão</option>
                        <option value="classe">Classe</option>
                        <option value="anosServico">Anos de serviço</option>
                        <option value="idade">Idade</option>
                        <option value="departamento">Departamento</option>
                        <option value="dataRegisto">Data de registo (ano-mês-dia)</option>
                    </select>



                    <input type="search" name="" id="" class="form-control" placeholder="Pesquise...">
                    <button type="submit" class="btn btn-outline-secondary">Pesquisar</button>


                </form>

            </div>



            <div class="row">
                <div class="col-12">
                    <div id="tabelaProgressaoFuncionariosLoad"></div>
                </div>
            </div>

        </section>


    </main>



    <script>
        $(document).ready(function() {
            $('#tabelaProgressaoFuncionariosLoad').load('./funcionarios/tabelaProgressaoFuncionarios.php')
        });
    </script>
</body>

</html>