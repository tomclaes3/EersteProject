#!/bin/bash

MYSQLPASSWORD='root'

XDEBUG=$(cat <<EOF
zend_extension=xdebug.so
xdebug.remote_enable = 1
xdebug.remote_connect_back = 1
xdebug.remote_port = 9000
EOF
)

VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/html/"
    ServerName webadv
    ServerAlias webadv
    <Directory "/var/www/html/">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
)

apt-get install python-software-properties
add-apt-repository ppa:ondrej/php

apt-get update

apt-get -y install php7.3 libapache2-mod-php
apt-get -y install zip unzip php7.3-zip
apt-get -y install apache2

echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf
echo "${XDEBUG}" >> /etc/php/7.3/apache2/php.ini

sed -i s/display_errors\ =\ Off/display_errors\ =\ On/g /etc/php/7.3/apache2/php.ini

debconf-set-selections <<< "mysql-server mysql-server/root_password password $MYSQLPASSWORD"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $MYSQLPASSWORD"
apt-get -y install mysql-server
apt-get -y install php7.3-mysql
apt-get -y install php7.3-pdo-sqlite
apt-get install php-xdebug

debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $MYSQLPASSWORD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $MYSQLPASSWORD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $MYSQLPASSWORD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
apt-get -y install phpmyadmin

a2enmod rewrite

curl -Ss https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer

chown -R vagrant:www-data /var/www/html/
chmod g+s /var/www/html/

service apache2 restart
