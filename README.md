## Proload 2021 :: Zapito ##

# Executar o projeto


Projeto executado com o docker e docker-compose

Comando: 
 docker-compose up -d
 


# Acesse o container para rodar o update do composer
docker exec -it proload_2021_zapito_app_1 bash
composer update

### IMPORTANTE: 
O script run_install_clean.sh, é para instalação limpa,ou seja para o Teste de avalização não é necessário sua execução.
Mas, para outros projetos ele instala automaticamente o Laravel versão7 e o backpack versão 4.1.

OBS: add no composer.json =>  "laravel-doctrine/migrations": "^2.5"
Referencia: https://packagist.org/packages/laravel-doctrine/migrations
Senão o crud nao funciona do backpack

# Detalhes do Projeto

# .gitignore
Para o Teste de avaliação o DB será commitado para facilitar o Teste, sem a necessidade de popular o Database, por default não subi para o Github
/shared_db


#
# Crontab
comando: 
 crontab -e -> Abre o editor cron
 crontab -l -> lista os jobs agendados
 crontab -r -> remove os jobs agendados
# A cada 15 segundos exeecuta um disparo na API do Zapito
* * * * * ( sleep 15; curl http://localhost:8080/api/massive)


# Apenas Leitura
Comandos Laravel 7

##################################
#### BackPack Laravel comands ####
##################################
php artisan make:migration create_{name}_table = cria a tabela
php artisan backpack:crud {name} = cria o crud

##################################
####### Gerando Migration ########
##################################
php artisan make:migration insert_user_admin = add table user user

##################################
###### Gerando Seeders ###########
##################################
php artisan make:seeder RecipientsTableSeeder
php artisan db:seed = executa

##################################
####### Gerando Factory ##########
##################################
php artisan make:seeder RecipientsTableSeeder
php artisan db:seed --class=RecipientsTableSeeder = executa
