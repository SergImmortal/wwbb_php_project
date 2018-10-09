#!/bin/bash

sudo timedatectl set-timezone Europe/Kiev
# Update system
sudo apt-get update -y
sudo apt-get upgrade -y

# Clean /var/www
sudo rm -Rf /var/www/*

# Nginx setup
sudo apt-get -y install nginx
echo "Nginx installed"

# Copy project files
mkdir /var/www/wwbb.php
cp -R /home/serge/work/wwbb/wwbb_php_project/* /var/www/wwbb.php
chmod -R 777 /var/www/wwbb.php/*
echo "Project files copy"

sudo apt-get install -y python-software-properties
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y php7.2
sudo apt-get install -y php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml 
sudo apt-get install -y php7.2-readline php7.2-soap php7.2-xsl php7.2-zip php7.2-intl php7.2-fpm
sudo apt-get install -y php-xdebug
echo "Php installed"

#mysql-server
export DEBIAN_FRONTEND=noninteractive
sudo -E apt-get -q -y install mysql-server
mysqladmin -u root password 1111
echo "user for MySQL created"

mysql -uroot -p1111 -e "CREATE DATABASE wwbb_php DEFAULT CHARACTER SET utf8 ;"
mysql -uroot -p1111 -e "CREATE USER vagrant@localhost IDENTIFIED BY '1111';"
mysql -uroot -p1111 -e "GRANT ALL PRIVILEGES ON wwbb_php.* TO 'vagrant'@'localhost';"
mysql -uroot -p1111 -e "FLUSH PRIVILEGES;"
echo "Table created"

sudo apt-get install -y php-mysql
echo "Mysql-server installed"

sudo ln -s /var/www/wwbb.php/provision/nginx.conf  /etc/nginx/sites-enabled/
sudo mysql -u vagrant -p1111 wwbb_php < /var/www/wwbb.php/provision/wwbb_php.sql
sudo apt-get autoremove -y
sudo service php7.2-fpm restartto
sudo service nginx restart
echo "Server start"

## Composer
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
echo "Composer installed"

## Laravel 
composer global require "laravel/installer"
