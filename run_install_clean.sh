#!/bin/bash
#

data=$(date +%d-%m-%Y)
dia="`date +%d-%m-%Y`"
hora=$(date +"%H:%M:%S")


echo "###############################################################################$" 
echo "#                        Script laravel                                        $" 
echo "#                                                                              $" 
echo "#                     TESTE :: ZAPITO PROLOAD 2021                             $" 
echo "#                                                                              $" 
echo "#            Script by: Raphael Gomes Moraes                                   $" 
echo "#            Email: raphael2k2moraes@gmail.com                                 $" 
echo "#            GitHub: https://github.com/raphaelgmoraes/                        $" 
echo "#                                                                              $" 
echo "#                                                                              $" 
echo "###############################################################################$\n" 
sleep 2
#echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" 
#echo "deletando instalação do laravel se exixtir !       "
#echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n" 
#sleep 5;

#DIR="shared_web"
#if [ -d "$DIR" ]; then
#  
#  echo "Removendo o diretório: ${DIR} "
#  rm -rf "$DIR"
#  echo "Criando o diretório: ${DIR} "
#  mkdir -p $DIR
#else
#  
#  echo "Diretório: ${DIR} não existe, estamos criando agora ... !"
#  mkdir -p $DIR
#  exit 1
#fi

echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" 
echo "Construindo o projeto com os arquivos Dockfile e docker-composer.yml.            "  
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n" 
docker-compose up -d 
sleep 2
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" 
echo "Estrutura Docker (Containers), criados com sucesso!                               "  
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n" 
sleep 5;
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" 
echo "Acessando, instalando laravel7 e baxkpack : proload_2021_zapito_app_1 bash       "  
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n" 
sleep 2
docker exec -it proload_2021_zapito_app_1 /bin/bash -c \
    "sleep 2;
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++'; 
        echo 'instalação Laravel 7! :)       ';  
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n'; 
        sleep 5;
        composer create-project --prefer-dist laravel/laravel ./ '7.*';
        php artisan key:generate;
        sleep 5;
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++'; 
        echo 'Permissão à pasta storage e bootstrap/cashe       ';  
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n'; 
        chown -R www-data:www-data storage/;
        chown -R www-data:www-data bootstrap/cache/;
        chmod -R 775 storage/;
        chmod -R 775 bootstrap/cache/;
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++'; 
        echo 'Editando arquivo .env e adicionando info do DB       ';  
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n'; 
        sleep 5;
        sed -i 's/DB_HOST=127.0.0.1/DB_HOST=db/g' .env;
        sed -i 's/DB_DATABASE=laravel/DB_DATABASE=zapito_db/g' .env;
        sed -i 's/DB_PASSWORD=/DB_PASSWORD=kr@tos_goku/g' .env;
        sleep 5;
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++'; 
        echo 'Instalando o backpaxk 4.1 :)               ';  
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n'; 
        composer require backpack/crud:"'4.1.*'";
        composer require backpack/generators --dev;
        composer require laracasts/generators --dev;
        php artisan backpack:install;
        composer require --dev laravel-shift/blueprint;
        composer require guzzlehttp/guzzle;       
        
        sleep 5;
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++'; 
        echo 'INSTALAÇÂO REALIZADA COM SUCESSO :)        ';  
        echo 'Acesse seu browser e divirta-se !          '; 
        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n'; 
    "
  

# sleep 5
# # php artisan make:migration create_tags_table
# # sleep 2
# # php artisan backpack:crud tags

# echo "Processo Finalizado!" 
