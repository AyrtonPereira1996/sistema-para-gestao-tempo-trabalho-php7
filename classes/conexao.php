<?php

class Conexao {

    // VARIÁVEIS PRIVADAS PARA ACEDER A BD
    private $servidor = "us-cdbr-east-04.cleardb.com";
    private $usuario = "bb98ca2343e648";
    private $senha = "d8c8a596";
    private $bd = "heroku_820acf6dce6a2f3";


    // FUNÇÃO QUE ESTABELECE CONEXÃO COM A BD
    public function conectar() {
        $conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->bd);
        mysqli_set_charset($conexao, "utf8mb4");
        // if (!$conexao) {
        //     echo "Falha conexao";
        // } else {
        //     echo "Conectado";
        // };

        return $conexao;
    }
}
