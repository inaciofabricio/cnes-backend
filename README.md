# Cnes - Backend

## PHP - Codeginiter

Projeto backend em PHP para auxiliar na visualização dos dados do Cadastro Nacional de Estabelecimentos de Saúde (CNES) no Brasil.

### 1º Passo 
> Baixa e instalar o Xampp em https://www.apachefriends.org/pt_br/index.html;

### 2º Passo 
> Abrir o XAMMP Control Panel e Iniciar os Modulo Apche e Mysql;

### 3º Passo 
> Baixar o Workbench em https://www.mysql.com/products/workbench/

### 4º Passo
> Executar os scripts baixo para criar as tabela estabelecimento e estado, popular a tabela estado

<pre>
    CREATE TABLE IF NOT EXISTS `estabelecimento` (
    `co_cnes` varchar(15) NOT NULL,
    `co_ibge` varchar(15) NOT NULL,
    `no_fantasia` varchar(255) NOT NULL,
    `ds_tipo_unidade` varchar(255) NOT NULL,
    `tp_gestao` varchar(10) NOT NULL,
    `no_logradouro` varchar(255) NOT NULL,
    `nu_endereco` varchar(15) NOT NULL,
    `no_bairro` varchar(255) NOT NULL,
    `co_cep` varchar(255) NOT NULL,
    `uf` varchar(2) NOT NULL,
    `municipio` varchar(255) NOT NULL,
    `nu_telefone` varchar(20) NOT NULL,
    PRIMARY KEY (`co_cnes`),
    UNIQUE KEY `co_cnes_estabelecimento` (`co_cnes`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

    CREATE TABLE IF NOT EXISTS `estado` (
    `uf` varchar(2) NOT NULL,
    `nome` varchar(255) NOT NULL,
    PRIMARY KEY (`uf`),
    UNIQUE KEY `uf_estado` (`uf`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

    /* POPULAR A TABELA estado */
    INSERT INTO estado (uf,nome) VALUES ('AC','Acre');  
    INSERT INTO estado (uf,nome) VALUES ('AL','Alagoas');  
    INSERT INTO estado (uf,nome) VALUES ('AM','Amazonas');
    INSERT INTO estado (uf,nome) VALUES ('AP','Amapá');
    INSERT INTO estado (uf,nome) VALUES ('BA','Bahia');
    INSERT INTO estado (uf,nome) VALUES ('CE','Ceará');
    INSERT INTO estado (uf,nome) VALUES ('DF','Distrito Federal');
    INSERT INTO estado (uf,nome) VALUES ('ES','Espírito Santo');
    INSERT INTO estado (uf,nome) VALUES ('GO','Goiás');
    INSERT INTO estado (uf,nome) VALUES ('MA','Maranhão');
    INSERT INTO estado (uf,nome) VALUES ('MG','Minas Gerais');
    INSERT INTO estado (uf,nome) VALUES ('MS','Mato Grosso do Sul');
    INSERT INTO estado (uf,nome) VALUES ('MT','Mato Grosso');
    INSERT INTO estado (uf,nome) VALUES ('PA','Pará');
    INSERT INTO estado (uf,nome) VALUES ('PB','Paraíba');
    INSERT INTO estado (uf,nome) VALUES ('PE','Pernambuco');
    INSERT INTO estado (uf,nome) VALUES ('PI','Piauí');
    INSERT INTO estado (uf,nome) VALUES ('PR','Paraná');
    INSERT INTO estado (uf,nome) VALUES ('RJ','Rio de Janeiro');
    INSERT INTO estado (uf,nome) VALUES ('RN','Rio Grande do Norte');
    INSERT INTO estado (uf,nome) VALUES ('RO','Rondônia');
    INSERT INTO estado (uf,nome) VALUES ('RR','Roraima');
    INSERT INTO estado (uf,nome) VALUES ('RS','Rio Grande do Sul');
    INSERT INTO estado (uf,nome) VALUES ('SC','Santa Catarina');
    INSERT INTO estado (uf,nome) VALUES ('SE','Sergipe');
    INSERT INTO estado (uf,nome) VALUES ('SP','São Paulo');
    INSERT INTO estado (uf,nome) VALUES ('TO','Tocantins');
</pre>

    
### 5º Passo 
> Baixar o projeto no respositorio https://github.com/inaciofabricio/cnes-backend, o colocar ele na pasta htdocs, da instalação do xampp (Exemplo - C:\xampp\htdocs)


