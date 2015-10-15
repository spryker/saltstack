#
# Install and configure local MySQL server for development / QA
# For production setup, a high-available solution or DBaaS (database-as-a-service) should be used
#

{% set mysql_package_name = {
    'wheezy': 'mysql-server-5.6',
    'jessie': 'mariadb-server-10.0',
}.get(grains.lsb_distrib_codename) %}

mysql-server:
  pkg:
    - installed
    - name: {{ mysql_package_name }}

mysql:
  service:
    - running
    - enable: True
    - watch:
      - pkg: mysql-server
      - file: /etc/mysql/my.cnf

/etc/mysql/my.cnf:
  file.managed:
    - source: salt://mysql-server/files/etc/mysql/my.cnf
    - template: jinja

/etc/mysql/conf.d/strict.cnf:
  file.managed:
    - source: salt://mysql-server/files/etc/mysql/conf.d/strict.cnf
