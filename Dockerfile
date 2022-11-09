FROM centos:7

USER root

RUN yum -y update \
    && yum -y install epel-release yum-utils \
    && yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    && yum-config-manager --enable remi-php74 \
    && yum -y install php php-common php-opcache php-mcrypt php-cli php-dom php-gd php-curl php-mysqlnd php-pgsql php-mbstring php-zip php-mcrypt pdo pdo_msql \
    && yum -y install httpd unzip sqlite \
    && yum clean all

#Install composer
WORKDIR /tmp
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer


#Install app
WORKDIR /var/www/html

#Copy files
ADD . /var/www/html
RUN mv .env.prod .env

ADD docker/httpd.conf /etc/httpd/conf/httpd.conf
ADD docker/welcome.conf /etc/httpd/conf.d/welcome.conf

RUN chown -R apache:apache /var/www/html/storage/ /var/www/html/bootstrap/cache/ \
    && composer install --no-dev

EXPOSE 80

ENTRYPOINT ["/usr/sbin/httpd","-D","FOREGROUND"]
