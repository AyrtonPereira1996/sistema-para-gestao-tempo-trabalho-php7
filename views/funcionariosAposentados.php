<?php
session_start();
ini_set('display_errors', 1);
require_once "./dependencias.php";
require_once "../classes/conexao.php";

if (isset($_SESSION['usuario'])) {



?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área funcionários aposentados | SIGETES</title>
    <?php require_once "./top-side-bar-menu.php"; ?>

</head>

<body>

    <main class="container-fluid">
        <section>
            <h1>Registos de funcionários aposentados</h1>

            <div class="row mt-5">
                

                <form id="frmPesquisaFuncionario" class="frm-pesquisa">


                    <span>Pesquisa:</span>


                    <select name="" id="itemsPesquisa" class="form-select ">
                        <option value="">Escolha o campo</option>
                        <option value="codigoRegisto">Código de registo</option>
                        <option value="nomeFuncionario">Nome do funcionário</option>
                        <option value="cargo">Anos de carreira</option>
                        <option value="escalao">Data inicio de carreira</option>
                        <option value="classe">Data de aposentação</option>
                    </select>



                    <input type="search" name="" id="" class="form-control" placeholder="Pesquise...">
                    <button type="submit" class="btn btn-outline-secondary">Pesquisar</button>
                   


                </form>

            </div>



            <div class="row">
                <div class="col-12">
                    <div id="tabelaFuncionariosAposentadosLoad"></div>
                </div>
            </div>

        </section>


    </main>



    <script>
        $(document).ready(function() {
            $('#tabelaFuncionariosAposentadosLoad').load('./funcionarios/tabelaFuncionariosAposentados.php');
        });
    </script>
</body>

</html>

<?php
} else {
    header("location:../index.php");
}

?>