<?php

class Funcionarios {


    public function adicionarFuncionario($dados) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "INSERT INTO funcionarios (idFuncionario, idDepartamento, nomeFuncionario, dataNascimento, numeroNUIT, numeroBI, escalaoFuncionario, classeFuncionario, cargo, dataInicioCarreira, isAposentado, isUserSystem, dataRegisto) values (default, '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', default, default, '$dados[9]')";
      
        return mysqli_query($conexao, $sql);
    }

    public function excluirFuncionario($idFuncionario) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "DELETE FROM funcionarios WHERE idFuncionario = '$idFuncionario'";
        echo mysqli_query($conexao, $sql);
    }

    public function recuperarDadosFuncionario($idFuncionario) {
        $con = new Conexao();
        $conexao = $con->conectar();
      
        
        $sql = "SELECT f.idFuncionario, f.idDepartamento, f.nomeFuncionario, f.dataNascimento, f.numeroNUIT, f.numeroBI, f.escalaoFuncionario, f.classeFuncionario, f.cargo, f.dataInicioCarreira, f.dataRegisto, d.nomeDepartamento from funcionarios as f join departamentos as d on f.idDepartamento = d.idDepartamento where f.idFuncionario = '$idFuncionario'";
        $resultado =  mysqli_query($conexao, $sql);
        $resultadoItem = mysqli_fetch_row($resultado);

        $dados = array(
            "idFuncionario" => $resultadoItem[0],
            "idDepartamento" => $resultadoItem[1],
            "nomeFuncionario" =>  $resultadoItem[2],
            "dataNascimento" => $resultadoItem[3],
            "numeroNUIT" => $resultadoItem[4],
            "numeroBI" => $resultadoItem[5],
            "escalao" => $resultadoItem[6],
            "classe" => $resultadoItem[7],
            "cargo" => $resultadoItem[8],
            "dataInicioCarreira" => $resultadoItem[9],
            "dataRegisto" => $resultadoItem[10],
            "nomeDepartamento" => $resultadoItem[11]
        );

        return $dados;
    }

    public function recuperarDadosDetalhadosFuncionario($idFuncionario) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "SELECT f.idFuncionario, f.nomeFuncionario, f.dataNascimento, YEAR(f.dataNascimento), f.numeroNUIT, f.numeroBI, f.escalaoFuncionario, f.classeFuncionario, f.cargo, f.dataInicioCarreira, YEAR(f.dataInicioCarreira), f.isAposentado, f.isUserSystem, f.dataRegisto, d.nomeDepartamento from funcionarios as f inner join departamentos as d on f.idDepartamento = d.idDepartamento WHERE f.idFuncionario = '$idFuncionario'";
        $resultado = mysqli_query($conexao, $sql);
        $resultadoItem = mysqli_fetch_row($resultado);


        $dados = array(
            "idFuncionario" => $resultadoItem[0],
            "nomeFuncionario" =>  $resultadoItem[1],
            "dataNascimento" => $resultadoItem[2],
            "idadeFuncionario" => (date('Y') - $resultadoItem[3]),
            "numeroNUIT" => $resultadoItem[4],
            "numeroBI" => $resultadoItem[5],
            "escalao" => $resultadoItem[6],
            "classe" => $resultadoItem[7],
            "cargo" => $resultadoItem[8],
            "dataInicioCarreira" => $resultadoItem[9],
            "anosServico" => (date('Y') - $resultadoItem[10]),
            "isAposentado" => $resultadoItem[11],
            "isUserSystem" => $resultadoItem[12],
            "dataRegisto" => $resultadoItem[13],
            "nomeDepartamento" => $resultadoItem[14]
        );

        return $dados;

       
    }

}