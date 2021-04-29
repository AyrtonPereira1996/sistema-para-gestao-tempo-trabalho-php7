<?php
ini_set('display_errors', 1);
require_once "./dependencias.php";
require_once "../classes/conexao.php";

$con = new Conexao();
$conexao = $con->conectar();

$sqlPesquisaDepartamentos = "SELECT idDepartamento, nomeDepartamento from departamentos";
$resultPesquisaDepartamentos = mysqli_query($conexao, $sqlPesquisaDepartamentos);

?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários | SIGETES</title>
    <?php require_once "./top-side-bar-menu.php"; ?>

</head>

<body>

    <main class="container-fluid">
        <section>
            <h1>Registos de funcionários</h1>
            <div class="row">
                <span class="simple-label">Registar novo funcionário<span data-bs-toggle="modal" data-bs-target="#modalRegistoFuncionario"><i class="fas fa-plus-circle fa-fw fa-lg text-success"></i></span></span>
                <div class="col-12">
                    <div id="tabelaFuncionariosLoad"></div>
                </div>
            </div>

        </section>


    </main>



    <!-- MODALS -->

    <div class="modal fade" id="modalRegistoFuncionario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRegistoUsuario" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registo de usuário de sistema</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"> </button>
                </div>

                <div class="modal-body">
                    <form id="frmRegistoFuncionario" class="row" method="POST">
                        <div class="alert alert-danger alert-dismissible fade show error-fields-registo-funcionario" role="alert"><i class="fas fa-exclamation-triangle"></i> Preencha os campos que são obrigatórios
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="col-12">
                            <label for="txtNomeFuncionario" class="form-label">Nome completo</label>
                            <input type="text" name="txtNomeFuncionario" id="txtNomeFuncionario" class="form-control" placeholder="Nome completo do funcionário">

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="txtDataNascimento" class="form-label">D. Nascimento</label>
                            <input type="date" id="txtDate" name="txtDate" class="form-control">


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>

                        </div>

                        <div class="col-4">
                            <label for="txtBI" class="form-label">Nº BI</label>
                            <input type="text" name="txtBI" id="txtBI" placeholder="Nº de BI" class="form-control" maxlength="13" minlength="13">

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>

                        </div>

                        <div class="col-4">
                            <label for="txtNUIT" class="form-label">Nº NUIT</label>
                            <input type="text" name="txtNUIT" id="txtNUIT" placeholder="NUIT" class="form-control" maxlength="9" minlength="9">


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>




                        <div class="col-4">
                            <label for="txtDepartamento" class="form-label">Departamento</label>
                            <select class="form-control" name="txtDepartamento" id="txtDepartamento">
                                <option selected>Escolha o departamento</option>
                                <?php

                                while ($dados = mysqli_fetch_row($resultPesquisaDepartamentos)) : ?>
                                    <option value="<?php echo $dados[0]; ?>"><?php echo $dados[1]; ?></option>
                                <?php endwhile; ?>
                            </select>


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>


                        <div class="col-4">
                            <label for="txtEscalao" class="form-label">Escalão</label>
                            <select class="form-control" name="txtEscalao" id="txtEscalao">
                                <option selected>Escolha o escalão</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="txtClasse" class="form-label">Classe</label>
                            <select id="txtClasse" name="txtClasse" class="form-control">
                                <option selected>Escolha a classe</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="txtCargo" class="form-label">Cargo</label>
                            <input type="text" name="txtCargo" id="txtCargo" class="form-control" placeholder="Cargo do funcionário">


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="txtDataInicioCarreira" class="form-label">D. inicio carreira</label>
                            <input type="date" name="txtDataInicioCarreira" id="txtDataInicioCarreira" class="form-control">


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-form" id="btnRegistarFuncionario">Salvar funcionário</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#tabelaFuncionariosLoad').load('./funcionarios/tabelaFuncionarios.php');

            $('#btnRegistarFuncionario').on('click', function() {
                $('#frmRegistoFuncionario').on('submit', function(evento) {
                    evento.preventDefault();
                });

                nomeFuncionario = $('#txtNomeFuncionario');
                dataNascimento = $('#txtDate');
                numeroBI = $('#txtBI');
                numeroNUIT = $('#txtNUIT');
                departamento = $('#txtDepartamento');
                escalao = $('#txtEscalao');
                classe = $('#txtClasse');
                cargo = $('#txtCargo');
                dataInicioCarreira = $('#txtDataInicioCarreira');

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

                function isNotDifferentPassword(password, passwordConfirm) {
                    if (password.val() == passwordConfirm.val()) {
                        $('.alert-wrong-password').fadeOut('fast');

                        return true;
                    } else {
                        $('.alert-wrong-password').fadeIn('fast');
                        return false;
                    }
                };

                if (isNotEmpty(nomeFuncionario) && isNotEmpty(dataNascimento) && isNotEmpty(numeroBI) && isNotEmpty(numeroNUIT) && isNotEmpty(departamento) && isNotEmpty(escalao) && isNotEmpty(classe) && isNotEmpty(cargo) && isNotEmpty(dataInicioCarreira)) {
                    let dados = $('#frmRegistoFuncionario').serialize();
                    console.log(dados);
                    $.ajax({
                        type: "POST",
                        data: dados,
                        url: '../procedimentos/funcionarios/adicionarFuncionario.php',
                        success: function(r) {
                            alert(r);
                            if (r == 1) {
                                alertify.alert('Funcionário salvo com sucesso', 'Funcionário salvo com sucesso! Registe-o como usuário super-admin do sistema no formulário seguinte', function() {
                                    location.reload();
                                });

                                // alertify.notify('Funcionário salvo com sucesso. Registe-o como usuário super-Admin', 'custom', 5);

                            } else {
                                alertify.alert('Erro ao salvar o funcionário', 'Não foi possível salvar com sucesso!');
                            };
                        }
                    });




                };




            });
        })
    </script>
</body>

</html>