-- Usuário

create table usuario(
	idUsuario int(6) NOT NULL AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
    email varchar(30) NOT NULL,
	login varchar(16) NOT NULL,
    senha varchar(16) NOT NULL,
    PRIMARY KEY (idUsuario)
);

-- Tópico

create table topico(
	idTopico int(6) NOT NULL AUTO_INCREMENT,
	idUsuario int(6) NOT NULL,
	assunto varchar(100) NOT NULL,
	descricao text(400) NOT NULL,
    dataCriacao datetime NOT NULL,
    dataUltimaAtualizacao date NOT NULL,
	PRIMARY KEY (idTopico)
);

ALTER TABLE topico
ADD CONSTRAINT fkTopicoUsuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario);

-- Mensagem

create table mensagem(
	idMensagem int(6) NOT NULL AUTO_INCREMENT,
	idTopico int(6) NOT NULL,
	idUsuario int(6) NOT NULL,
	mensagem text(400) NOT NULL,
	dataEnvio datetime NOT NULL,
	PRIMARY KEY (idMensagem)
);

ALTER TABLE mensagem
ADD CONSTRAINT fkMensagemTopico FOREIGN KEY (idTopico) REFERENCES topico (idTopico);
ALTER TABLE mensagem
ADD CONSTRAINT fkMensagemUsuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario);

--MensagemDireta

create table mensagemDireta(
	idMensagem int(6) NOT NULL AUTO_INCREMENT,
	idUsuarioOrigem int(6) NOT NULL,
	idUsuarioDestino int(6) NOT NULL,
	mensagem text(400) NOT NULL,
	dataEnvio datetime NOT NULL,
	PRIMARY KEY (idMensagem)
);

ALTER TABLE mensagemDireta
ADD CONSTRAINT fkMensagemDiretaUsuarioOrigem FOREIGN KEY (idUsuarioOrigem) REFERENCES usuario (idUsuario);
ALTER TABLE mensagemDireta
ADD CONSTRAINT fkMensagemDiretaUsuarioDestino FOREIGN KEY (idUsuarioDestino) REFERENCES usuario (idUsuario);