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

# Instalando e executando o PHP
- php -S localhost:porta
- Acesse: http://localhost:3000
