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
    <title>Área promoção dos funcionários | SIGETES</title>
    <?php require_once "./top-side-bar-menu.php"; ?>

</head>

<body>

    <main class="container-fluid">
        <section>
            <h1>Registos das promoções dos funcionários</h1>

            <div class="row mt-5">

                <form id="frmPesquisaFuncionario" class="frm-pesquisa">


                    <span>Pesquisa:</span>


                    <select name="" id="itemsPesquisa" class="form-select ">
                        <option value="">Escolha o campo</option>
                        <option value="codigoRegisto">Código de registo</option>
                        <option value="nomeFuncionario">Nome do funcionário</option>
                        <option value="cargo">Cargo que assume</option>
                        <option value="escalao">Classe anterior</option>
                        <option value="classe">Classe actual</option>
                        <option value="anosServico">Data de promoção</option>
                    </select>



                    <input type="search" name="" id="" class="form-control" placeholder="Pesquise...">
                    <button type="submit" class="btn btn-outline-secondary">Pesquisar</button>


                </form>

            </div>


            <div class="row">
                <div class="col-12">
                    <div id="tabelaPromocaoFuncionariosLoad"></div>
                </div>
            </div>

        </section>


    </main>



    <script>
        $(document).ready(function() {
            $('#tabelaPromocaoFuncionariosLoad').load('./funcionarios/tabelaPromocaoFuncionarios.php');
        });
    </script>
</body>

</html>


<?php
} else {
    header("location:../index.php");
}

?>