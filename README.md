# Proload 2021 :: Zapito ##

## Executar o projeto

### Permissão de execução
- chmod +x run_install_clean.sh

### Roda a instalação e update necessários
- ./run_install_clean.sh

### acessa container
- sudo docker exec -it proload_2021_zapito_app_1 bash

### Permissões
- chown -R www-data:www-data storage/;
- chown -R www-data:www-data bootstrap/cache/;
- chmod -R 775 storage/;
- chmod -R 775 bootstrap/cache/;

### Copiar .env.example para .env
- cp .env.example .env

### Executa a migrete fresh
- Dentro do container faça:

- php artisan migrate:fresh

## Acesse o container para rodar o update do composer
docker exec -it proload_2021_zapito_app_1 bash
composer update

# Acesso FrontEnd da AplicaçãoS

- Digital Ocean :: VPS
- Link do projeto: http://134.122.38.186:8080
- Login:admin@admin.com.br
- Senha: 123456

- AWS :: Ec2
- Link do projeto: http://3.14.1.246:8080
- Login: admin@admin.com.br
- Senha: 123456


# IMPORTANTE: 
- O script run_install_clean.sh, é para instalação limpa,ou seja para o Teste de avalização 
não é necessário sua execução.
Mas, para outros projetos ele instala automaticamente o Laravel versão7 e o backpack versão4.1.

- OBS:Caso apresente erro de conexão Banco de dados
- add no composer.json =>  "laravel-doctrine/migrations": "^2.5"
- Referencia: https://packagist.org/packages/laravel-doctrine/migrations
- Senão o crud nao funciona do backpack

# Detalhes do Projeto

## .gitignore
- Para o Teste de avaliação o DB será commitado para facilitar o Teste, sem a necessidade de popular o Database, por default não subi para o Github
/shared_db

## Crontab
- comando: 
 - crontab -e -> Abre o editor cron
 - crontab -l -> lista os jobs agendados
 - crontab -r -> remove os jobs agendados
## A cada 15 segundos exeecuta um disparo na API do Zapito
- " * * * * * ( sleep 15; curl http://localhost:8080/api/massive) "

## Apenas Leitura

#### BackPack Laravel comands ####
php artisan make:migration create_{name}_table = cria a tabela
php artisan backpack:crud {name} = cria o crud

## Gerando Migration

php artisan make:migration insert_user_admin = add table user user


## Gerando Seeders

php artisan make:seeder RecipientsTableSeeder
php artisan db:seed = executa

## Gerando Factory 

php artisan make:seeder RecipientsTableSeeder
php artisan db:seed --class=RecipientsTableSeeder = executa
