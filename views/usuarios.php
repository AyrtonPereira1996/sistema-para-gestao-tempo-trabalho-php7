<?php
ini_set('display_errors', 1);
require_once "./dependencias.php";
require_once "../classes/conexao.php";

$con = new Conexao();
$conexao = $con->conectar();

$sqlPesquisarFuncionarios = "SELECT f.idFuncionario, f.nomeFuncionario, d.nomeDepartamento from funcionarios as f join departamentos as d on f.idDepartamento = d.idDepartamento";
$resultPesquisarFuncionarios = mysqli_query($conexao, $sqlPesquisarFuncionarios);

$sqlPesquisarROLE_USERS = "SELECT idROLE_USER, tipoROLE_USER from ROLE_USERS;";
$resultPesquisarROLE_USERS = mysqli_query($conexao, $sqlPesquisarROLE_USERS);

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
            <h1>Gestão de usuários</h1>
            <div class="row">
                <span class="add-label">Registar novo usuário<span data-bs-toggle="modal" data-bs-target="#modalRegistoUsuario"><i class="fas fa-plus-circle fa-fw fa-lg text-success"></i></span></span>
                <div class="col-12">
                    <div id="tabelaUsuariosLoad"></div>
                </div>

        </section>

        </div>
    </main>

    <!-- MODALS -->

    <div class="modal fade" id="modalRegistoUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRegistoUsuario" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Registo de usuário de sistema</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"> </button>
                </div>

                <div class="modal-body">
                    <form id="frmRegistoUsuario" class="row" method="POST">

                        <div class="alert alert-danger alert-dismissible fade show error-fields-registo-usuario" role="alert"><i class="fas fa-exclamation-triangle"></i> Preencha os campos que são obrigatórios
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="alert alert-danger alert-wrong-password" role="alert">
                            A senhas não coicidem. Volte a introduzir as senhas de acesso do usuário.
                        </div>

                        <div class="col-12">
                            <label for="txtFuncionarioUsuario" class="form-label">Escolha o funcionario</label>
                            <select class="form-control" name="txtFuncionarioUsuario" id="txtFuncionarioUsuario" id="lista-funcionarios">
                                <option selected>Escolha um funcionário</option>
                                <?php


                                while ($dados = mysqli_fetch_row($resultPesquisarFuncionarios)) : ?>

                                    <option value="<?php echo ($dados[0]); ?>"><?php echo ($dados[1]); ?> -> Departamento:<?php echo ($dados[2]); ?> </option>
                                <?php endwhile; ?>
                            </select>

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>


                        <div class="col-12">
                            <label for="txtEmail" class="form-label">Correio electrónico/E-mail</label>
                            <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="E-mail">


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="txtUserRole" class="form-label">Tipo de usuário</label>
                            <select class="form-control" id="txtUserRole" name="txtUserRole">
                                <option value="" selected>Escolha o tipo de usuário em relação ao previlégios</option>
                                <?php

                                while ($dados = mysqli_fetch_row($resultPesquisarROLE_USERS)) : ?>

                                    <option value="<?php echo $dados[0]; ?>"><?php echo $dados[1]; ?></option>

                                <?php endwhile; ?>
                            </select>


                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-8">
                            <label for="txtSenha" class="form-label">Digite a senha do usuário</label>
                            <input type="password" name="txtSenha" id="txtSenha" class="form-control" placeholder="Digite uma senha">

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>

                        <div class="col-8">
                            <label for="txtSenhaConfirmacao" class="form-label">Volte a digitar a senha</label>
                            <input type="password" id="txtSenhaConfirmacao" class="form-control" placeholder="Volte a digitar uma senha">

                            <div class="campo-invalido-vazio">
                                <i class="fas fa-times"></i>Campo obrigatório!
                            </div>
                        </div>


                        <div class="col-4">
                            <button type="submit" class="btn btn-success" id="btnRegistarUsuario">Salvar usuário</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

    </div>



    <script>
        $(document).ready(function() {
            $('#tabelaUsuariosLoad').load('./usuarios/tabelaUsuarios.php');

            $('#btnRegistarUsuario').on('click', function() {
                $('#frmRegistoUsuario').on('submit', function(evento) {
                    evento.preventDefault();
                });

                idFuncionario = $('#txtFuncionarioUsuario');
                emailFuncionario = $('#txtEmail');
                roleUser = $('#txtUserRole');
                senha = $('#txtSenha');
                confirmacaoSenha = $('#txtSenhaConfirmacao');
                textValue = $('#txtFuncionarioUsuario').val();
                idValueFuncionario = $('#lista-funcionarios [value ="' + textValue + '"]').data('value');

                function isNotEmptyUsuario(field) {
                    if (field.val() == "") {
                        $('.error-fields-registo-usuario').fadeIn('fast');
                        field.css('border', 'solid 2px #dc3545');
                        $('#inputs-user-data .campo-invalido-vazio').fadeIn('slow');
                        return false;
                    } else {
                        if (isNotDifferentPassword(senha, confirmacaoSenha)) {
                            field.css('border', 'solid 2px #198754');
                        } else {
                            senha.css('border', 'solid 2px #dc3545');
                            confirmacaoSenha.css('border', 'solid 2px #dc3545');
                        }
                        return true;
                    };
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

                if (isNotEmptyUsuario(idFuncionario) && isNotEmptyUsuario(emailFuncionario) && isNotEmptyUsuario(roleUser) && isNotEmptyUsuario(senha) && isNotEmptyUsuario(confirmacaoSenha)) {
                    if (isNotDifferentPassword(senha, confirmacaoSenha)) {
                        dados = $('#frmRegistoUsuario').serialize();

                        $.ajax({
                            url: "../procedimentos/login/adicionarUsuario.php",
                            method: 'POST',
                            data: dados,
                            success: function(r) {
                                if (r == 1) {
                                    $('#tabelaUsuariosLoad').load('./usuarios/tabelaUsuarios.php')
                                    alertify.alert('Usuario salvo com sucesso', 'Usuário salvo com sucesso!', function() {
                                        setTimeout(function() {
                                            window.location.href = "./usuarios.php";
                                        }, 1000);
                                    });


                                } else {
                                    alertify.alert('Erro ao salvar o usuário', 'Não foi possível salvar com sucesso!');
                                };
                            }
                        });
                    };
                };

            });
        });
    </script>

</body>

</html>