<?php
    include_once("conexao.inc");
    include_once("../model/usuario.inc");

class UsuarioDAO {
    private $con;

    public function UsuarioDAO(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirUsuario(Usuario $usuario){
        $sql = $this->con->prepare("insert into usuario (nome, email, login, senha) values (:nome, :email, :login, :senha)");

        $sql->bindValue(':nome', $usuario->getNome());
        $sql->bindValue(':email', strtolower($usuario->getEmail()));
        $sql->bindValue(':login', strtolower($usuario->getLogin()));
        $sql->bindValue(':senha', $usuario->getSenha());

        $sql->execute();
    }

    public function buscarUsuarioPorId($idUsuario) {
        $sql = $this->con->prepare("select * from usuario where idUsuario = :idUsuario");

        $sql->bindValue(':idUsuario', $idUsuario);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuarioAux = $sql->fetch(PDO::FETCH_OBJ);
            $usuario = new Usuario($usuarioAux->idUsuario, $usuarioAux->nome, $usuarioAux->email, $usuarioAux->login, $usuarioAux->senha);

            return $usuario;
        }
        return null;
    }

    public function buscarUsuarioPorLogin($login) {
        $sql = $this->con->prepare("select * from usuario where login = :login");

        $sql->bindValue(':login', strtolower($login));

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuarioAux = $sql->fetch(PDO::FETCH_OBJ);
            $usuario = new Usuario($usuarioAux->idUsuario, $usuarioAux->nome, $usuarioAux->email, $usuarioAux->login, $usuarioAux->senha);

            return $usuario;
        }
        return null;
    }

    public function buscarUsuarioPorEmail($email) {
        $sql = $this->con->prepare("select * from usuario where email = :email");

        $sql->bindValue(':email', strtolower($email));

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuarioAux = $sql->fetch(PDO::FETCH_OBJ);
            $usuario = new Usuario($usuarioAux->idUsuario, $usuarioAux->nome, $usuarioAux->email, $usuarioAux->login, $usuarioAux->senha);

            return $usuario;
        }
        return null;
    }

    public function efetuarLogin($login, $senha) {
        $sql = $this->con->prepare("select * from usuario where login = :login and senha = :senha");

        $sql->bindValue(':login', strtolower($login));
        $sql->bindValue(':senha', $senha);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuarioAux = $sql->fetch(PDO::FETCH_OBJ);
            $usuario = new Usuario($usuarioAux->idUsuario, $usuarioAux->nome, $usuarioAux->email, $usuarioAux->login, $usuarioAux->senha);
            return $usuario;
        }
        return null;
    }

    public function getUsuarios(){
        $sql = $this->con->query("select * from usuario order by nome");

        $lista = array();

        while($usuarioAuxiliar = $sql->fetch(PDO::FETCH_OBJ)){
            $usuario = new Usuario($usuarioAuxiliar->idUsuario, $usuarioAuxiliar->nome, $usuarioAuxiliar->email, $usuarioAuxiliar->login, $usuarioAuxiliar->senha);

            $lista[] = $usuario;
        }
        return $lista;
    }

    public function getTotalUsuarios(){
        $sql = $this->con->query("select count(*) from usuario");

        return $sql->fetch(PDO::FETCH_COLUMN);
    }

    public function alterarUsuario($idUsuario, $nome, $senha) {
        $sql = $this->con->prepare("update usuario set nome = :nome, senha = :senha where idUsuario = :idUsuario");

        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':idUsuario', $idUsuario);

        $sql->execute();
    }
}

?>