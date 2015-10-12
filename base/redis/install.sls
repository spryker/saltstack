#
# Install package, remove default service
#

redis-server:
  pkg:
    - installed

# Make sure that redis bgsave can overcommit virtual memory
vm.overcommit_memory:
  sysctl.present:
    - value: 1

# Setup init script(s) for OS without systemd
{%- if "systemd" not in grains %}
# Init script for multiple instances
/etc/init.d/redis-server:
  file.managed:
    - source: salt://redis/files/etc/init.d/redis-server
    - watch_in:
      - service: redis-services

# Remove default redis instance
/etc/redis/redis.conf:
  file.absent:
    - watch_in:
      - service: redis-services

redis-services:
  service.running:
    - name: redis-server
    - enable: True
    - require:
      - pkg: redis-server
      - file: /etc/init.d/redis-server
      - file: /etc/redis/redis.conf

{%- else %}
redis-service:
  service.dead:
    - name: redis-server
    - enable: False
{%- endif %}
