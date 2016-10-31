#
# Update PHP package
#
# Note: this state is included only if pillar setting autoupdate:php is true

# Update php packages. We have to specify here php7.0, php7.0-common (to force
# upgrading php extensions installed via debian packages) and php7.0-fpm
# (to workaround debian package system installing libapache2-mod-php7.0)
update-php:
  pkg.latest:
    - pkgs:
      - php7.0-fpm
      - php7.0-common
      - php7.0-dev
