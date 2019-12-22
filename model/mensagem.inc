<?php

include_once('usuario.inc');
include_once('topico.inc');

class Mensagem {
    private $idMensagem;
    private $usuario;
    private $mensagem;
    private $dataEnvio;

    public function Mensagem($idMensagem, Usuario $usuario, $mensagem, $dataEnvio) {
        $this->idMensagem = $idMensagem;
        $this->usuario = $usuario;
        $this->mensagem = $mensagem;
        $this->dataEnvio = $dataEnvio;
    }

    public function getIdMensagem() {
        return $this->idMensagem;
    }

    public function setIdMensagem($idMensagem) {
        $this->idMensagem = $idMensagem;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function getDataEnvio() {
        return $this->dataEnvio;
    }

    public function setDataEnvio($dataEnvio) {
        $this->dataEnvio = $dataEnvio;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

}