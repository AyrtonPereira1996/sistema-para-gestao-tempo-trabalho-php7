<?php

class Usuarios
{

    public function adicionarUsuario($dados) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $sql = "INSERT INTO usuarios (idUsuario, idRole_Users, idFuncionario, email, senha, dataRegistoUsuario) values (default, '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', now())";
        
        return mysqli_query($conexao, $sql);
    }

    public function efectuarLogin($dados) {
        $con = new Conexao();
        $conexao = $con->conectar();

        $senha = sha1($dados[1]);

        $sql = "SELECT * from usuarios where email = '$dados[0]' and senha = '$senha'";
        
        $result = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($result) > 0) {  
            return 1;
        } else { 
            return 0;
        };

    }
}
