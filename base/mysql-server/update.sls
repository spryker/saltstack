#
# Update mysql package
#
# Note: this state is included only if pillar setting autoupdate:mysql is true

{% set mysql_package_name = {
    'wheezy': 'mysql-server-5.6',
    'jessie': 'mariadb-server-10.0',
}.get(grains.lsb_distrib_codename) %}

update-mysql:
  pkg.latest:
    - name: {{ mysql_package_name }}
