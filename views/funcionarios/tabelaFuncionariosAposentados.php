<?php
ini_set('display_errors', 1);
require_once "../../classes/conexao.php";

$con = new Conexao();
$conexao = $con->conectar();

$sqlPesquisaFuncionariosAposentados = "SELECT p.idFuncionario_aposentado, f.nomeFuncionario, f.dataInicioCarreira, p.dataAposentadoria FROM funcionarios_aposentados as p INNER JOIN funcionarios as f on p.idFuncionario = f.idFuncionario";
$resultPesquisaFuncionariosAposentados = mysqli_query($conexao, $sqlPesquisaFuncionariosAposentados);

?>
<div class="table-responsive">
    <table class="table table-sm table-bordered border-primary">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome do funcionário</th>
                <th>Anos de carreira</th>
                <th>Data inicio carreira</th>
                <th>Data de aposentação</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php
            if($dadosPesquisaFuncionariosAposentados = mysqli_fetch_row($resultPesquisaFuncionariosAposentados)) {
                while($dadosPesquisaFuncionariosAposentados = mysqli_fetch_row($resultPesquisaFuncionariosAposentados)) : ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="" onclick="">
                        Detalhes
                    </button>
                </td>
            </tr>
            <?php endwhile;
            } else {
                echo "<caption>Sem registos</caption>";
            }
            ?>
        </tbody>
    </table>
</div>