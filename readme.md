building php img

1. cd ./ {root dir}
2. sudo docker build -t edu_php --file php_docker/Dockerfile .

building apache img

1. cd ./apache_docker
2. sudo docker build --no-cache -t edu_apache .


run docker 
docker-compose up -d

stop docker 
docker-compose down
