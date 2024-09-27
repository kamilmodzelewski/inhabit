FROM debian
WORKDIR /var/www
RUN apt update
RUN apt upgrade -y
RUN apt install -y apt-transport-https lsb-release ca-certificates wget 
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list 
RUN apt update
RUN apt install -y npm
RUN apt install -y php8.3 
RUN apt install -y php8.3-curl
RUN apt install -y php8.3-pdo
RUN apt install -y php8.3-mysql
RUN apt install -y php8.3-dom
RUN apt install -y php8.3-zip
RUN apt install -y composer
COPY ./init.sh /
RUN chmod +x /init.sh
EXPOSE 8000
CMD ["bash", "/init.sh"]