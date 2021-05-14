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