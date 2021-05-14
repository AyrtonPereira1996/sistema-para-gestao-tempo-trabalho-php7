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
    <title>Área funcionários aposentados | SIGETES</title>
    <?php require_once "./top-side-bar-menu.php"; ?>

</head>

<body>

    <main class="container-fluid">
        <section>
            <h1>Registos das promoções dos funcionários</h1>
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