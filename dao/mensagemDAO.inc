<?php
    include_once("conexao.inc");
    include_once("../model/mensagem.inc");
    include_once("../model/usuario.inc");
    include_once("../dao/usuarioDAO.inc");
    include_once("../dao/topicoDAO.inc");

    class MensagemDAO {
        private $con;

        public function MensagemDAO(){
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        public function incluirMensagem(Mensagem $mensagem, $idTopico){
            $sql = $this->con->prepare("insert into mensagem (idTopico, idUsuario, mensagem, dataEnvio) values (:idTopico, :idUsuario, :mensagem, :dataEnvio)");

            $sql->bindValue(':idTopico', $idTopico);
            $sql->bindValue(':idUsuario', $mensagem->getUsuario()->getIdUsuario());
            $sql->bindValue(':mensagem', $mensagem->getMensagem());
            $sql->bindValue(':dataEnvio', $this->converteDataMysql($mensagem->getDataEnvio()));

            $sql->execute();

            $topicoDAO = new TopicoDAO();

            $topicoDAO->atualizarDataUltimaAtualizacao($idTopico, $mensagem->getDataEnvio());
        }

        public function getMensagens($idTopico){
            $sql = $this->con->prepare("select * from mensagem where idTopico = :idTopico");

            $usuarioDAO = new UsuarioDAO();

            $sql->bindValue(':idTopico', $idTopico);

            $sql->execute();

            $lista = array();

            while($mensagemAux = $sql->fetch(PDO::FETCH_OBJ)){
                $usuario = $usuarioDAO->buscarUsuarioPorId($mensagemAux->idUsuario);

                $mensagem= new Mensagem($mensagemAux->idMensagem, $usuario, $mensagemAux->mensagem, strtotime($mensagemAux->dataEnvio));

                $lista[] = $mensagem;
            }
            return $lista;
        }

        public function getTotalMensagens($idTopico){
            $sql = $this->con->prepare("select count(*) from mensagem where idTopico = :idTopico");

            $sql->bindValue(':idTopico', $idTopico);

            $sql->execute();

            return $sql->fetch(PDO::FETCH_COLUMN);
        }

        public function excluirMensagem($idMensagem) {
            $topicoDAO = new TopicoDAO();

            $sql = $this->con->prepare("select idTopico from mensagem where idMensagem = :idMensagem");

            $sql->bindValue(':idMensagem', $idMensagem);

            $sql->execute();

            $idTopico = (int) $sql->fetch(PDO::FETCH_COLUMN);

            $sql = $this->con->prepare("delete from mensagem where idMensagem = :idMensagem");

            $sql->bindValue(':idMensagem', $idMensagem);

            $sql->execute();

            $dataUltimaAtualizacao = strtotime($this->getUltimaAtualizacao($idTopico));

            $topicoDAO->atualizarDataUltimaAtualizacao($idTopico, $dataUltimaAtualizacao);
        }

        public function excluirTodasMensagensTopico($idTopico) {
            $sql = $this->con->prepare("delete from mensagem where idTopico = :idTopico");

            $sql->bindValue(':idTopico', $idTopico);

            $sql->execute();
        }

        public function getUltimaAtualizacao($idTopico){
            $sql = $this->con->prepare("select max(dataEnvio) from mensagem where idTopico = :idTopico");

            $sql->bindValue(':idTopico', $idTopico);

            $sql->execute();

            return $sql->fetch(PDO::FETCH_COLUMN);
        }

        private function converteDataMysql($data) {
            return date('Y-m-d H:i:s', $data);
        }
    }

?>