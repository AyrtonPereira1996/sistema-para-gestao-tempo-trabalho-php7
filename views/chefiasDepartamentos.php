<?php
ini_set('display_errors', 1);
require_once "./dependencias.php";
require_once "../classes/conexao.php";

$con = new Conexao();
$conexao = $con->conectar();

$sqlPesquisaDepartamentos = "SELECT idDepartamento, nomeDepartamento FROM departamentos";
$resultPesquisaDepartamentos = mysqli_query($conexao, $sqlPesquisaDepartamentos);

$sqlPesquisaFuncionarios = "SELECT f.idFuncionario, f.nomeFuncionario, d.nomeDepartamento FROM funcionarios as f inner join departamentos as d on f.idDepartamento = d.idDepartamento";
$resultPesquisaFuncionarios = mysqli_query($conexao, $sqlPesquisaFuncionarios);
?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos | SIGETES</title>
    <?php require_once "./top-side-bar-menu.php"; ?>

</head>

<body>

    <main class="container-fluid">
        <section>
            <h1>Registos de chefes de departamentos</h1>
            <div class="row">

                <div class="group-labels text-right">
                    <a href="./departamentos.php"><span class="btn btn-link simple-label">Consultar/registar departamentos<spa data-bs-toggle="modal"></span></a>

                    <span class="simple-label"><button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalRegistoChefeDepartamento">Associar novo chefe<i class="fas fa-plus-circle fa-fw fa-lg"></i></button></span>
                </div>



                <div class="col-12">
                    <div id="tabelaChefesDepartamentosLoad"></div>
                </div>
            </div>

        </section>


    </main>



    <!-- MODALS -->

    <!-- MODAL INSERCAO DEPARTAMENTO -->
    <div class="modal fade" id="modalRegistoChefeDepartamento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRegistoChefeDepartamento" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registo de chefe de departamento</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"> </button>
                </div>

                <div class="modal-body">
                    <form method="post" id="frmRegistoChefeDepartamento">
                        <div class="alert alert-danger alert-dismissible fade show error-fields-registo-departamento" role="alert"><i class="fas fa-exclamation-triangle"></i> Preencha os campos que são obrigatórios
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="col-12">
                            <label for="txtNomeDepartamento" class="form-label">Nome do departamento</label>
                            <select name="txtNomeDepartamento" id="txtNomeDepartamento" class="form-control" onmousedown="document.querySelector('.item-not-to-select').remove()">
                                <option selected disabled class="item-not-to-select">Selecione o departamento</option>
                                <?php while ($dadosDepartamentos = mysqli_fetch_row($resultPesquisaDepartamentos)) : ?>
                                    <option value="<?php echo $dadosDepartamentos[0]; ?>"> <?php echo $dadosDepartamentos[1]; ?> </option>
                                <?php endwhile; ?>
                            </select>

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>


                        <div class="col-12">
                            <label for="txtNomeChefe" class="form-label">Funcionário a nomear</label>
                            <select name="txtNomeChefe" id="txtNomeChefe" class="form-control" onmousedown="document.querySelector('.item-not-to-select').remove()">
                                <option selected class="item-not-to-select">Selecione o funcionário</option>
                                <?php while ($dadosFuncionarios = mysqli_fetch_row($resultPesquisaFuncionarios)) : ?>
                                    <option value="<?php echo ($dadosFuncionarios[0]); ?>"> <?php echo ($dadosFuncionarios[1]); ?> -> Departamento: <?php echo ($dadosFuncionarios[2]); ?> </option>
                                <?php endwhile; ?>
                            </select>

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" id="btnRegistarChefeDepartamento" class="form-control btn btn-success">Salvar departamento</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>


    <!-- MODAL EXCLUSAO DEPARTAMENTO -->

    <!-- MODAL EXCLUSAO DEPARTAMENTO -->

    <div class="modal fade" id="modalConfirmacaoExclusaoChefiaDepartamento" tabindex="-1" aria-labelledby="Exclusao de chefe de  departamento" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Deseja excluir?</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem a certeza que deseja desassociar a chefia deste departamento ao funcionário?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btnExcluirChefiaDepartamento"><i class="fas fa-trash"></i> Excluir</button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL EDICAO DEPARTAMENTO -->


    <script>
        function excluirChefiaDepartamento(idChefiaDepartamento) {
            $('#btnExcluirChefiaDepartamento').on('click', function() {

                $.ajax({
                    type: "POST",
                    data: "idChefiaDepartamento=" + idChefiaDepartamento,
                    url: "../procedimentos/departamentos/excluirChefeDepartamento.php",
                    success: function(r) {

                        if (r == 1) {
                            $("#btnExcluirChefiaDepartamento").prop('disabled', true);
                            alertify.notify('Departamento excluído com sucesso ', 'success', 2, function() {
                                location.reload();
                            });
                        } else {
                            alertify.notify('Erro ao excluir', 'error', 2, function() {
                                location.reload();
                            });
                        };
                    }
                });
            });
        }






        $(document).ready(function() {
         
            $('#tabelaChefesDepartamentosLoad').load('./departamentos/tabelaChefiasDepartamento.php');
           
            $('#btnRegistarChefeDepartamento').on('click', function() {
                $('#frmRegistoChefeDepartamento').on('submit', function(evento) {
                    evento.preventDefault();
                });

                nomeDepartamento = $('#txtNomeDepartamento');
                nomeFuncionarioChefe = $('#txtNomeChefe');


                function isNotEmpty(field) {
                    if (field.val() == "") {
                        $('.error-fields-registo-funcionario').fadeIn('fast');
                        field.css('border', 'solid 2px #dc3545');
                        $('#frmRegistoChefeDepartamento .campo-invalido-vazio').fadeIn('slow');
                        return false;
                    } else {
                        field.css('border', 'solid 2px #198754');
                        return true;
                    }
                };

                if (isNotEmpty(nomeDepartamento) && isNotEmpty(nomeFuncionarioChefe)) {
                    dados = $('#frmRegistoChefeDepartamento').serialize();
                    $.ajax({
                        type: "POST",
                        data: dados,
                        url: "../procedimentos/departamentos/adicionarChefeDepartamento.php",
                        success: function(r) {
                            
                            if (r == 1) {
                                $("#txtNomeDepartamento").prop('disabled', true);
                                $("#txtNomeChefe").prop('disabled', true);
                                $("#btnRegistarChefeDepartamento").prop('disabled', true);
                                alertify.notify('Departamento registado com sucesso.', 'success', 2, function() {
                                    location.reload();
                                });

                            } else {
                                alertify.error('Erro ao registar.');
                            }

                        }
                    });
                }



            });

        });
    </script>
</body>

</html>