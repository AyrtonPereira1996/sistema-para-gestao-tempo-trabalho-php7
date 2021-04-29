<?php
require_once "./dependencias.php";
require_once "../classes/conexao.php";


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
            <h1>Registos de departamentos</h1>
            <div class="row">

                <div class="group-labels text-right">
                    <span class="btn btn-link simple-label">Consultar/registar chefes dos departamentos<spa data-bs-toggle="modal"></span>

                    <span class="simple-label">Registar novo departamento<span data-bs-toggle="modal" data-bs-target="#modalRegistoDepartamento"><i class="fas fa-plus-circle fa-fw fa-lg"></i></span></span>
                </div>



                <div class="col-12">
                    <div id="tabelaDepartamentosLoad"></div>
                </div>
            </div>

        </section>


    </main>



    <!-- MODALS -->

    <!-- MODAL INSERCAO DEPARTAMENTO -->
    <div class="modal fade" id="modalRegistoDepartamento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRegistoUsuario" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registo de departamento</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"> </button>
                </div>

                <div class="modal-body">
                    <form method="post" id="frmRegistoDepartamento">
                        <div class="alert alert-danger alert-dismissible fade show error-fields-registo-departamento" role="alert"><i class="fas fa-exclamation-triangle"></i> Preencha os campos que são obrigatórios
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="col-12">
                            <label for="txtNomeDepartamento" class="form-label">Nome do departamento</label>
                            <input type="text" id="txtNomeDepartamento" name="txtDepartamento" class="form-control" placeholder="Nome do departamento">

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" id="btnRegistarDepartamento" class="form-control btn btn-success">Salvar departamento</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>


    <!-- MODAL EXCLUSAO DEPARTAMENTO -->

    <div class="modal fade" id="modalConfirmacaoExclusaoDepartamento" tabindex="-1" aria-labelledby="Exclusao de departamento" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Deseja excluir?</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem a certeza que deseja mesmo excluir o departamento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btnExcluir"><i class="fas fa-trash"></i> Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDICAO DEPARTAMENTO -->
    <div class="modal fade" id="modalEdicaoDepartamento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEdicaoUsuario" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edição de departamento</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"> </button>
                </div>

                <div class="modal-body">
                    <form method="post" id="frmEdicaoDepartamento">
                        <div class="alert alert-danger alert-dismissible fade show error-fields-registo-departamento" role="alert"><i class="fas fa-exclamation-triangle"></i> Preencha os campos que são obrigatórios
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="col-12">
                            <label for="txtIdDepartamentoEdicao" class="form-label">Código do departamento</label>
                            <input type="text" id="txtIdDepartamentoEdicao" name="txtIdDepartamentoEdicao" class="form-control" placeholder="Código do departamento" readonly>

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="txtNomeDepartamentoEdicao" class="form-label">Nome do departamento</label>
                            <input type="text" id="txtNomeDepartamentoEdicao" name="txtNomeDepartamentoEdicao" class="form-control" placeholder="Nome do departamento">

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" id="btnEdicaoDepartamento" class="form-control btn btn-success">Editar dados</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>


    <script>
        function excluirDepartamento(idDepartemento) {
            $('#btnExcluir').on('click', function() {
                $.ajax({
                    type: "POST",
                    data: "idDepartamento=" + idDepartemento,
                    url: "../procedimentos/departamentos/excluirDepartamento.php",
                    success: function(r) {
                        if (r == 1) {
                            $("#btnExcluir").prop('disabled', true);
                            alertify.notify('Departamento excluído com sucesso ', 'success', 1.3, function() {
                                location.reload();
                            });
                        } else {
                            alertify.notify('Erro ao excluir', 'error', 1.3, function() {
                                location.reload();
                            });
                        };
                    }
                });
            });
        };

        function recuperarDadosEdicaoDepartamento(idDepartamento) {
            $.ajax({
                type: "POST",
                data: "idDepartamento=" + idDepartamento,
                url: "../procedimentos/departamentos/recuperarDadosEdicaoDepartamento.php",
                success: function(r) {
                    dados = jQuery.parseJSON(r);

                    $('#txtIdDepartamentoEdicao').val(dados['idDepartamento']);
                    $('#txtNomeDepartamentoEdicao').val(dados['nomeDepartamento']);


                }
            });
        };

        $(document).ready(function() {
            $('#tabelaDepartamentosLoad').load('./departamentos/tabelaDepartamentos.php');

            $('#btnRegistarDepartamento').on('click', function() {
                $('#frmRegistoDepartamento').on('submit', function(evento) {
                    evento.preventDefault();
                });

                nomeDepartamento = $('#txtNomeDepartamento');


                function isNotEmpty(field) {
                    if (field.val() == "") {
                        $('.error-fields-registo-funcionario').fadeIn('fast');
                        field.css('border', 'solid 2px #dc3545');
                        $('#frmRegistoFuncionario .campo-invalido-vazio').fadeIn('slow');
                        return false;
                    } else {
                        field.css('border', 'solid 2px #198754');
                        return true;
                    }
                };

                if (isNotEmpty(nomeDepartamento)) {
                    dados = $('#frmRegistoDepartamento').serialize();

                    $.ajax({
                        type: "POST",
                        data: dados,
                        url: "../procedimentos/departamentos/adicionarDepartamento.php",
                        success: function(r) {

                            if (r == 1) {
                                $("#txtNomeDepartamento").prop('disabled', true);
                                $("#btnEdicaoDepartamento").prop('disabled', true);
                                alertify.notify('Departamento registado com sucesso', 'success', 1.3, function() {
                                    location.reload();
                                });


                            } else {
                                alert("Erro ao editar");
                            };
                        }
                    });

                };
            });

            $('#btnEdicaoDepartamento').on('click', function() {
                $('#frmEdicaoDepartamento').on('submit', function(evento) {
                    evento.preventDefault();
                });

                nomeDepartamento = $('#txtNomeDepartamentoEdicao');


                function isNotEmpty(field) {
                    if (field.val() == "") {
                        $('.error-fields-registo-funcionario').fadeIn('fast');
                        field.css('border', 'solid 2px #dc3545');
                        $('#frmEdicaoDepartamento .campo-invalido-vazio').fadeIn('slow');
                        return false;
                    } else {
                        field.css('border', 'solid 2px #198754');
                        return true;
                    }
                };

                if (isNotEmpty(nomeDepartamento)) {
                    dados = $('#frmEdicaoDepartamento').serialize();

                    $.ajax({
                        type: "POST",
                        data: dados,
                        url: "../procedimentos/departamentos/edicaoDepartamento.php",
                        success: function(r) {

                            if (r == 1) {
                                $("#txtIdDepartamentoEdicao").prop('disabled', true);
                                $("#btnEdicaoDepartamento").prop('disabled', true);
                                alertify.notify('Departamento editado com sucesso', 'success', 1.3, function() {
                                    location.reload();
                                });


                            } else {
                                alert("Erro ao salvar");
                            };
                        }
                    });

                };



            });

        });
    </script>
</body>

</html>