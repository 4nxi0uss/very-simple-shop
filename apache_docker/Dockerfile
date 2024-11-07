# syntax=docker/dockerfile:1.7
FROM httpd:2.4-alpine

RUN apk update;
RUN apk upgrade;

# Copy Apache virtual host file to proxy .php requests to PHP container
COPY --link apache-vhost.conf /usr/local/apache2/conf/apache-vhost.conf
RUN echo "Include /usr/local/apache2/conf/apache-vhost.conf" \
    >> /usr/local/apache2/conf/httpd.conf
