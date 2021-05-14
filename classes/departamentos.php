<?php

class Departamentos
{
    // INSERCAO DE NOVO DEPARTAMENTO

    public function adicionarDepartamento($dados)
    {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "INSERT into departamentos (idDepartamento, nomeDepartamento, numeroTotalFuncionarios, dataRegisto) values (default, '$dados[0]', default, now())";

        return mysqli_query($conexao, $sql);
    }

    // EXCLUSAO DE REGISTO DE DEPARTAMENTO

    public function excluirDepartamento($idDepartamento)
    {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "DELETE from departamentos where idDepartamento = '$idDepartamento'";

        echo mysqli_query($conexao, $sql);
    }

    // RECUPERACAO DE DADOS PARA EDICAO DE REGISTO DE DEPARTAMENTO

    public function recuperarDadosEdicaoDepartamento($idDepartamento)
    {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "SELECT idDepartamento, nomeDepartamento FROM departamentos where idDepartamento = '$idDepartamento'";

        $result = mysqli_query($conexao, $sql);
        $resultItem = mysqli_fetch_row($result);

        $dados = array(
            'idDepartamento' => $resultItem[0],
            'nomeDepartamento' => $resultItem[1]
        );

        return $dados;
    }

    // EDICAO DE REGISTO DE DEPARTAMENTO
     
    public function editarDepartamento($dados){
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "UPDATE departamentos set nomeDepartamento = '$dados[1]' where idDepartamento = '$dados[0]'";
        return mysqli_query($conexao, $sql);
    }

    // EXCLUSAO DE REGISTO DEPARTAMENTO ASSOCIADO A UM DEPARTAMENTO

    public function adicionarChefeDepartamento($dados){
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "INSERT into funcionarios_chefes_departamentos (idFuncionarios_chefes_departamentos, idFuncionario, idDepartamento, dataRegisto) values (default, '$dados[0]', '$dados[1]', now())";
        return mysqli_query($conexao, $sql);
    }

    // EXCLUSAO DE DEPARTAMENTO ASSOCIADO A UM CHEFIA
    public function excluirChefeDepartamento($idChefiaDepartamento) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "DELETE FROM funcionarios_chefes_departamentos WHERE idFuncionarios_chefes_departamentos = '$idChefiaDepartamento'";
        
        echo mysqli_query($conexao, $sql);
    }

}
