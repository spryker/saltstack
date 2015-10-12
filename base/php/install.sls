#
# Install PHP and modules available from operating system distribution
#

{% set php5_ssh_package_name = {
    'wheezy': 'php5-ssh2',
    'jessie': 'libssh2-php',
}.get(grains.lsb_distrib_codename) %}

php:
  pkg.installed:
    - pkgs:
      - php5
      - php5-dev
      - php5-cli
      - php5-fpm
      - php5-curl
      - php5-gd
      - php5-gmp
      - php5-imagick
      - php5-intl
      - php5-mcrypt
      - php5-memcache
      - php5-mysql
      - php5-pgsql
      - php5-redis
      - php5-sqlite
      - php-pear
      - {{ php5_ssh_package_name }}
