## Proload 2021 :: Zapito ##

### IMPORTANTE: 
O script run_install_clean.sh, é para instalação limpa,ou seja para o Teste de avalização não é necessário sua execução.
Mas, para outros projetos ele instala automaticamente o Laravel versão7 e o backpack versão 4.1.

# Detalhes do Projeto

# Crontab
comando: crontab -e
# A cada 15 segundos exeecuta um disparo na API do Zapito
* * * * * ( sleep 15; curl http://localhost:8080/api/massive)


