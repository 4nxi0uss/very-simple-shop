building php img

1. cd ./ {project dir}
2. docker build --no-cache -t edu_php --file php_docker/Dockerfile .

building apache img

1. cd ./apache_docker
2. docker build --no-cache -t edu_apache .


run docker 

1. cd ./ {project dir}
2. docker-compose up -d

stop docker

1. cd ./ {project dir}
2. docker-compose down

run composer install
1. cd ./
2. docker exec -it php composer install
