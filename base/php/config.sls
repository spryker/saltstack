#
# Set php.ini configuration files
#

# Web apps (FPM)
/etc/php/7.0/fpm/php.ini:
  file.managed:
    - source: salt://php/files/etc/php/7.0/php.ini
    - require:
      - pkg: php

# CLI
/etc/php/7.0/cli/php.ini:
  file.managed:
    - source: salt://php/files/etc/php/7.0/php.ini
    - require:
      - pkg: php
