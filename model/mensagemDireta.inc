<?php

include_once('usuario.inc');

class MensagemDireta {
    private $idMensagem;
    private $usuarioOrigem;
    private $usuarioDestino;
    private $mensagem;
    private $dataEnvio;

    public function MensagemDireta($idMensagem, Usuario $usuarioOrigem, Usuario $usuarioDestino, $mensagem, $dataEnvio) {
        $this->idMensagem = $idMensagem;
        $this->usuarioOrigem = $usuarioOrigem;
        $this->usuarioDestino = $usuarioDestino;
        $this->mensagem = $mensagem;
        $this->dataEnvio = $dataEnvio;
    }

    public function getIdMensagem(){
        return $this->idMensagem;
    }

    public function setIdMensagem($idMensagem){
        $this->idMensagem = $idMensagem;
    }

    public function getUsuarioOrigem(){
        return $this->usuarioOrigem;
    }

    public function setUsuarioOrigem($usuarioOrigem){
        $this->usuarioOrigem = $usuarioOrigem;
    }

    public function getUsuarioDestino(){
        return $this->usuarioDestino;
    }

    public function setUsuarioDestino($usuarioDestino){
        $this->usuarioDestino = $usuarioDestino;
    }

    public function getMensagem(){
        return $this->mensagem;
    }

    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }

    public function getDataEnvio(){
        return $this->dataEnvio;
    }

    public function setDataEnvio($dataEnvio){
        $this->dataEnvio = $dataEnvio;
    }



}