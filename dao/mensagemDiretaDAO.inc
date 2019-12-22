<?php
include_once("conexao.inc");
include_once("../model/mensagemDireta.inc");
include_once("../model/usuario.inc");
include_once("../dao/usuarioDAO.inc");

class MensagemDiretaDAO{
    private $con;

    public function MensagemDiretaDAO(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirMensagemDireta(MensagemDireta $mensagemDireta){
        $sql = $this->con->prepare("insert into mensagemDireta (idUsuarioOrigem, idUsuarioDestino, mensagem, dataEnvio) values (:idUsuarioOrigem, :idUsuarioDestino, :mensagem, :dataEnvio)");

        $sql->bindValue(':idUsuarioOrigem', $mensagemDireta->getUsuarioOrigem()->getIdUsuario());
        $sql->bindValue(':idUsuarioDestino', $mensagemDireta->getUsuarioDestino()->getIdUsuario());
        $sql->bindValue(':mensagem', $mensagemDireta->getMensagem());
        $sql->bindValue(':dataEnvio', $this->converteDataMysql($mensagemDireta->getDataEnvio()));

        $sql->execute();
    }

    public function getMensagensDireta($idUsuarioOrigem, $idUsuarioDestino) {
        $sql = $this->con->prepare("select * from mensagemDireta where (idUsuarioOrigem = :idUsuarioOrigemA and idUsuarioDestino = :idUsuarioDestinoA) or (idUsuarioOrigem = :idUsuarioOrigemB and idUsuarioDestino = :idUsuarioDestinoB)");

        $usuarioDAO = new UsuarioDAO();

        $sql->bindValue(':idUsuarioOrigemA', $idUsuarioOrigem);
        $sql->bindValue(':idUsuarioDestinoA', $idUsuarioDestino);
        $sql->bindValue(':idUsuarioOrigemB', $idUsuarioDestino);
        $sql->bindValue(':idUsuarioDestinoB', $idUsuarioOrigem);

        $sql->execute();

        $lista = array();

        while($mensagemDiretaAux = $sql->fetch(PDO::FETCH_OBJ)){
            $usuarioOrigem = $usuarioDAO->buscarUsuarioPorId($mensagemDiretaAux->idUsuarioOrigem);
            $usuarioDestino = $usuarioDAO->buscarUsuarioPorId($mensagemDiretaAux->idUsuarioDestino);

            $mensagemDireta= new MensagemDireta($mensagemDiretaAux->idMensagem, $usuarioOrigem, $usuarioDestino, $mensagemDiretaAux->mensagem, strtotime($mensagemDiretaAux->dataEnvio));

            $lista[] = $mensagemDireta;
        }
        return $lista;
    }

    public function getTotalMensagensDireta($idUsuarioOrigem, $idUsuarioDestino) {
        $sql = $this->con->prepare("select count(*) from mensagemDireta where (idUsuarioOrigem = :idUsuarioOrigemA and idUsuarioDestino = :idUsuarioDestinoA) or (idUsuarioOrigem = :idUsuarioOrigemB and idUsuarioDestino = :idUsuarioDestinoB)");

        $sql->bindValue(':idUsuarioOrigemA', $idUsuarioOrigem);
        $sql->bindValue(':idUsuarioDestinoA', $idUsuarioDestino);
        $sql->bindValue(':idUsuarioOrigemB', $idUsuarioDestino);
        $sql->bindValue(':idUsuarioDestinoB', $idUsuarioOrigem);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_COLUMN);
    }

    public function excluirMensagemDireta($idMensagem) {
        $sql = $this->con->prepare("delete from mensagemDireta where idMensagem = :idMensagem");

        $sql->bindValue(':idMensagem', $idMensagem);

        $sql->execute();
    }

    private function converteDataMysql($data) {
        return date('Y-m-d H:i:s', $data);
    }
}

?>