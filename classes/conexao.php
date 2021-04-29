<?php

class Conexao {

    // Variaveis privadas para aceder a bd
    private $servidor = "localhost";
    private $usuario = "root";
    private $senha = "123456";
    private $bd = "sistema_sigetes";


    /** 
     * Para estabelecer a conexao a bd
     * */
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
