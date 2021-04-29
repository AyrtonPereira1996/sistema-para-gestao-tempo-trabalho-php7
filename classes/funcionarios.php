<?php

class Funcionarios {


    public function adicionarFuncionario($dados) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "INSERT INTO funcionarios (idFuncionario, idDepartamento, nomeFuncionario, dataNascimento, numeroNUIT, numeroBI, escalaoFuncionario, classeFuncionario, cargo, dataInicioCarreira, isAposentado, isUserSystem, dataRegisto) values (default, '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', default, default, '$dados[9]')";
      
        return mysqli_query($conexao, $sql);
    }

    public function actualizarIsUserSystemField($idFuncionario) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "UPDATE funcionarios set isUserSystem = 'Sim' where idFuncionario = '$idFuncionario'";
        return mysqli_query($conexao, $sql);
    }

}