#
# Install PHP and modules available from operating system distribution
#

php:
  pkg.installed:
    - pkgs:
      - php7.0-dev
      - php7.0-bcmath
      - php7.0-bz2
      - php7.0-cli
      - php7.0-fpm
      - php7.0-curl
      - php7.0-gd
      - php7.0-gmp
      - php7.0-imagick
      - php7.0-intl
      - php7.0-mbstring
      - php7.0-mcrypt
      - php7.0-memcached
      - php7.0-mysql
      - php7.0-pgsql
      - php7.0-redis
      - php7.0-sqlite3
      - php7.0-xml
      - php7.0-ssh2
      - php7.0-opcache
