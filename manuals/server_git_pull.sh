#!/bin/bash

##################################################
# script per sincronitzar el servidor amb git.
# es crea un cron per executar l'script.
# 

# anem al directori que volem sincronitzar
cd /var/www/html/projectx/

# sincronitzem amb el repositori de la branca principal
git pull

##################################################
# entrada del cron per que s'actualitzi cada dia a 
# les 5 del matí.
#########
# 0 5 * * * /root/scripts/server_git_pull.sh >> /dev/null 2>&1
