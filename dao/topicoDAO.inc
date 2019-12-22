<?php
    include_once("conexao.inc");
    include_once("../model/topico.inc");
    include_once("../model/usuario.inc");
    include_once("../model/mensagem.inc");
    include_once("usuarioDAO.inc");
    include_once("mensagemDAO.inc");

    class TopicoDAO {
        private $con;

        public function TopicoDAO(){
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        public function incluirTopico(Topico $topico){
            $sql = $this->con->prepare("insert into topico (idUsuario, assunto, descricao, dataCriacao, dataUltimaAtualizacao) values (:idUsuario, :assunto, :descricao, :dataCriacao, :dataUltimaAtualizacao)");

            $sql->bindValue(':idUsuario', $topico->getUsuario()->getIdUsuario());
            $sql->bindValue(':assunto', $topico->getAssunto());
            $sql->bindValue(':descricao', $topico->getDescricao());
            $sql->bindValue(':dataCriacao', $this->converteDataMysql($topico->getDataCriacao()));
            $sql->bindValue(':dataUltimaAtualizacao', $this->converteDataMysql($topico->getDataUltimaAtualizacao()));

            $sql->execute();
        }

        public function buscarIdUltimoTopico() {
            $sql = $this->con->query("select idTopico from topico order by idTopico desc limit 1");

            return $sql->fetch(PDO::FETCH_COLUMN);
        }

        public function getTopicosUltimaAtualiazacao(){
            $sql = $this->con->query("select * from topico order by dataUltimaAtualizacao desc");

            $usuarioDAO = new UsuarioDAO();

            $lista = array();

            while($topicoAuxiliar = $sql->fetch(PDO::FETCH_OBJ)){
                $usuario = $usuarioDAO->buscarUsuarioPorId($topicoAuxiliar->idUsuario);

                $topico = new Topico($topicoAuxiliar->idTopico, $usuario, $topicoAuxiliar->assunto, $topicoAuxiliar->descricao, strtotime($topicoAuxiliar->dataCriacao), strtotime($topicoAuxiliar->dataUltimaAtualizacao));

                $lista[] = $topico;
            }
            return $lista;
        }

        public function getTotalTopicos(){
            $sql = $this->con->query("select count(*) from topico");

            return $sql->fetch(PDO::FETCH_COLUMN);
        }

        public function buscarTopicoPorId($idTopico) {
            $sql = $this->con->prepare("select * from topico where idTopico = :idTopico");

            $usuarioDAO = new UsuarioDAO();
            $mensagemDAO = new MensagemDAO();

            $sql->bindValue(':idTopico', $idTopico);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $topicoAuxiliar = $sql->fetch(PDO::FETCH_OBJ);

                $usuario = $usuarioDAO->buscarUsuarioPorId($topicoAuxiliar->idUsuario);

                $topico = new Topico($topicoAuxiliar->idTopico, $usuario, $topicoAuxiliar->assunto, $topicoAuxiliar->descricao, strtotime($topicoAuxiliar->dataCriacao), strtotime($topicoAuxiliar->dataUltimaAtualizacao));

                $listaMensagens = $mensagemDAO->getMensagens($topico->getIdTopico());

                $topico->addMensagem($listaMensagens);

                return $topico;
            }
            return null;
        }

        public function atualizarDataUltimaAtualizacao($idTopico, $dataUltimaAtualizacao){
            $sql = $this->con->prepare("update topico set dataUltimaAtualizacao = :dataUltimaAtualizacao where idTopico = :idTopico");

            $sql->bindValue(':idTopico', $idTopico);
            $sql->bindValue(':dataUltimaAtualizacao', $this->converteDataMysql($dataUltimaAtualizacao));

            $sql->execute();
        }

        public function excluirTopico($idTopico) {
            $mensagemDAO = new MensagemDAO();

            $mensagemDAO->excluirTodasMensagensTopico($idTopico);

            $sql = $this->con->prepare("delete from topico where idTopico = :idTopico");

            $sql->bindValue(':idTopico', $idTopico);

            $sql->execute();
        }

        private function converteDataMysql($data) {
            return date('Y-m-d H:i:s', $data);
        }


    }

?>