# Tlab-project - In progress

## Testando a Aplicação

Baixe o projeto ou clone em um diretório de sua preferência.

Após terminar de baixar, execute o comando `composer update` no diretorio criado para atualizar os repositorios do projeto.

Você pode utilizar o servidor de testes do próprio CodeIgniter utilizando o comando `php spark serve`, mas se preferir, pode ser usado algum servidor Web, como o Apache, IIS etc. 


**Lembrando que o host deve ser apostado para o diretório '/public' da aplicação**

## Setup

Copie o arquivo `env` para `.env` e personalizar seu aplicativo, especificamente a baseURL
e quaisquer configurações do banco de dados.

## Base de Dados

Use o script para criar a base de dados que é utilizada no projeto.

```sql
CREATE DATABASE sistema_eventos;
USE sistema_eventos;

CREATE TABLE usuario(
	id_usuario INT NOT NULL AUTO_INCREMENT,
	usuario VARCHAR( 25 ) NOT NULL UNIQUE,
    email VARCHAR( 100 ) NOT NULL UNIQUE,
	senha VARCHAR( 40 ) NOT NULL ,
	CONSTRAINT usuario_pk PRIMARY KEY (id_usuario)
);

CREATE TABLE evento (
	id_evento INT NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(300) NOT NULL,
	inicio TIME NOT NULL,
	termino TIME NOT NULL,
	id_criador INT,
	CONSTRAINT evento_pk PRIMARY KEY (id_evento),
	CONSTRAINT evento_criador_fk FOREIGN KEY(id_criador) REFERENCES usuario(id_usuario)
);
```