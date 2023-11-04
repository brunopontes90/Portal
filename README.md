# Portal
Projeto criado com afins de estudos, esse projeto devera ler arquivos xls e txt com dados de usuarios
O projeto sera criado com as tecnologias Docker Mysql, Php, HTML e CSS inicialmente. Podendo sofrer alterações para bootstrap.

# Configuração do docker
- Instalando o docker:
	. sudo apt install docker.io
- Criando o docker
	. docker pull mysql
	. docker run --name Portal -e MYSQL_ROOT_PASSWORD=sua_senha -d mysql

- Para pegar o ip do seu container docker, use uma das opções abaixo:
	. docker inspect mysql	
	. docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' Portal

- Como instalar o mysql-server + mysq-workbench

- Use o script "Portal" em seu container mysql
