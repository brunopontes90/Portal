# Portal
Projeto criado com afins de estudos, esse projeto devera ler arquivos xls e txt com dados de usuarios
O projeto sera criado com as tecnologias Docker Mysql, Php, HTML e CSS inicialmente. Podendo sofrer alterações para bootstrap.

# Configuração do docker + Mysql

- Como instalar o mysql-server + mysq-workbench: https://www.youtube.com/watch?v=CBK7c1xp-zI
- Instalando o docker:
	. sudo apt install docker.io
- Criando o docker
	. docker pull mysql
	. docker run --name Portal -e MYSQL_ROOT_PASSWORD=sua_senha -d mysql

- Executando o container docker:
	. docker start Portal

- Case precise parar o container docker:
	. docker stop Portal

- Para pegar o ip do seu container docker, use uma das opções abaixo:
	. docker inspect mysql	
	. docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' Portal

- Use o script "Portal.sql" em seu container mysql

# Instalando o PHP

- sudo apt update
- sudo apt install software-properties-common
- sudo add-apt-repository ppa:ondrej/php
- sudo apt update
- sudo apt install php8.0
- php -v

# Instalando o PDO

- sudo apt-get install php*-mysql 
- sudo service apache2 restart


# Executando o servidor PHP

- Entre na pasta onde esta o projeto
- Certifique-se que nesta pasta tenha um arquivo na raiz index.php
- Rode o comando: php -S localhost:porta
-  - Ex: php -S localhost:3000
- Acesse no navegador: http://localhost:porta
- - Ex: http://localhost:3000

# Instalando o Git

- Abra o terminal
- sudo apt install git

# Configurando o Git

- git config --global user.name "seu_nome"
- git config --global user.email "seu_email"
- git config --global core.editor vscode
- - nesse caso estou usando a IDE vscode
- Execute o comando abaixo para ver suas configurações
- - git config --list