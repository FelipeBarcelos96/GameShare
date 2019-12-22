<?php

class Usuario {
    private $idUsuario;
    private $nome;
    private $email;
    private $login;
    private $senha;

        public function Usuario($idUsuario, $nome, $email, $login, $senha) {
            $this->idUsuario = $idUsuario;
            $this->nome = $nome;
            $this->email = strtolower($email);
            $this->login = strtolower($login);
            $this->senha = $senha;
        }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = strtolower($login);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = strtolower($email);
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

}

?>