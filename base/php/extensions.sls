#
# PHP Extensions:
#  - install extensions not provided by deb repositories
#  - configure extensions
#
{% from 'php/macros/php_module.sls' import php_module with context %}

# If pillar enables xdebug - install and configure it
{% if salt['pillar.get']('php:install_xdebug', False) %}
xdebug:
  pecl.installed

/etc/php5/mods-available/xdebug.ini:
  file.managed:
    - source: salt://php/files/etc/php5/mods-available/xdebug.ini
    - user: root
    - group: root
    - mode: 644
    - require:
      - pecl: xdebug

{{ php_module('xdebug', salt['pillar.get']('php:enable_xdebug', False), 'fpm') }}
{{ php_module('xdebug', salt['pillar.get']('php:enable_xdebug', False), 'cli') }}
{% endif %}

# If pillar enables xhprof - install and configure it
{% if salt['pillar.get']('php:install_xhprof', False) %}
xhprof:
  pecl.installed:
    - preferred_state: beta

/etc/php5/mods-available/xhprof.ini:
  file.managed:
    - source: salt://php/files/etc/php5/mods-available/xhprof.ini
    - user: root
    - group: root
    - mode: 644
    - require:
      - pecl: xhprof

{{ php_module('xhprof', salt['pillar.get']('php:enable_xhprof', False), 'fpm') }}
{{ php_module('xhprof', salt['pillar.get']('php:enable_xhprof', False), 'cli') }}
{% endif %}


# Configure Zend OpCache extension - no need to install, as it ships with
# php5-common package from dotdeb-php56
/etc/php5/mods-available/opcache.ini:
  file.managed:
    - source: salt://php/files/etc/php5/mods-available/opcache.ini
    - template: jinja
    - user: root
    - group: root
    - mode: 644

/etc/php5/cli/conf.d/05-opcache.ini:
  file.absent

/etc/php5/fpm/conf.d/05-opcache.ini:
  file.absent


{{ php_module('opcache', salt['pillar.get']('php:enable_opcache', True), 'fpm') }}
{{ php_module('opcache', salt['pillar.get']('php:enable_opcache', True), 'cli') }}

# Install CTwig extension
pear-ctwig-channel:
  cmd.run:
    - name: pear channel-discover pear.twig-project.org
    - unless: pear list-channels | grep pear.twig-project.org

pear-ctwig-install:
  cmd.run:
    - name: pear install twig/CTwig
    - unless: pear list -c pear.twig-project.org | grep CTwig
    - require:
      - cmd: pear-ctwig-channel

/etc/php5/mods-available/twig.ini:
  file.managed:
    - source: salt://php/files/etc/php5/mods-available/twig.ini
    - user: root
    - group: root
    - mode: 644

{{ php_module('twig', true, 'fpm') }}
