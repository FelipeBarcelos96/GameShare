<?php

include_once('usuario.inc');

class Topico {
    private $idTopico;
    private $usuario;
    private $assunto;
    private $descricao;
    private $dataCriacao;
    private $dataUltimaAtualizacao;
    private $mensagem;

    public function Topico($idTopico, Usuario $usuario, $assunto, $descricao, $dataCriacao, $dataUltimaAtualizacao) {
        $this->idTopico = $idTopico;
        $this->usuario = $usuario;
        $this->assunto = $assunto;
        $this->descricao = $descricao;
        $this->dataCriacao = $dataCriacao;
        $this->dataUltimaAtualizacao = $dataUltimaAtualizacao;
        $this->mensagem = array();
    }

    public function getIdTopico() {
        return $this->idTopico;
    }

    public function setIdTopico($idTopico) {
        $this->idTopico = $idTopico;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDataUltimaAtualizacao() {
        return $this->dataUltimaAtualizacao;
    }

    public function setDataUltimaAtualizacao($dataUltimaAtualizacao) {
        $this->dataUltimaAtualizacao = $dataUltimaAtualizacao;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function addMensagem($mensagem) {
        $this->mensagem[] = $mensagem;
    }

    public function limparMensagens(){
        $this->mensagem = null;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }
}