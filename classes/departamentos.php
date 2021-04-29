<?php

class Departamentos
{

    public function adicionarDepartamento($dados)
    {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "INSERT into departamentos (idDepartamento, nomeDepartamento, numeroTotalFuncionarios, dataRegisto) values (default, '$dados[0]', default, now())";

        return mysqli_query($conexao, $sql);
    }

    public function excluirDepartamento($idDepartamento)
    {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "DELETE from departamentos where idDepartamento = '$idDepartamento'";

        echo mysqli_query($conexao, $sql);
    }

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

    public function editarDepartamento($dados){
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "UPDATE departamentos set nomeDepartamento = '$dados[1]' where idDepartamento = '$dados[0]'";
        return mysqli_query($conexao, $sql);
    }

}
