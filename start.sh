#!/bin/bash

cp src/.env.example src/.env
cd .docker
cp .env.example .env
./run.sh
cd ..
#docker exec backend composer install
#docker exec backend php artisan key:generate
#docker exec backend php artisan migrate --seed
