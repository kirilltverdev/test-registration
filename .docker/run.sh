#!/bin/bash
uid=$(id -u)
user=$(whoami)

docker compose stop
docker compose build --build-arg uid=$uid --build-arg user=$user
docker compose up -d