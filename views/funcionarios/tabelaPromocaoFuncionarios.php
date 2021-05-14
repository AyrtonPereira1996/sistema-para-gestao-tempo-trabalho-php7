<?php
ini_set('display_errors', 1);
require_once "../../classes/conexao.php";

$con = new Conexao();
$conexao = $con->conectar();

$sqlPesquisaPromocaoFuncionarios = "SELECT p.idFuncionario_promovido, f.nomeFuncionario, p.classe_antiga, p.classe_actual, p.dataRegisto_promocao FROM funcionarios_promocao_carreiras as p INNER JOIN funcionarios as f on p.idFuncionario = f.idFuncionario";
$resultPesquisaPromocaoFuncionarios = mysqli_query($conexao, $sqlPesquisaPromocaoFuncionarios);

?>

<div class="table-responsive">
    <table class="table table-sm table-bordered border-primary">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome do funcionário</th>
                <th>Cargo</th>
                <th>Classe antigo</th>
                <th>Classe actual</th>
                <th>Data da promoção</th>
                <th>Acções</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($dadosPesquisaPromocaoFuncionarios = mysqli_fetch_row($resultPesquisaPromocaoFuncionarios)) {
                while ($dadosPesquisaPromocaoFuncionarios = mysqli_fetch_row($resultPesquisaPromocaoFuncionarios)) : ?>
                    <tr>
                        <td></td>
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