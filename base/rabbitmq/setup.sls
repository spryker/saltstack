#
# Install RabbitMQ (message queue broker)
#

rabbitmq-server:
  pkg.installed:
    - name: rabbitmq-server
  service.running:
    - enable: true
    - require:
      - pkg: rabbitmq-server

enable-rabbitmq-management:
  cmd.run:
    - name: rabbitmq-plugins enable rabbitmq_management
    - unless: rabbitmq-plugins list | grep '\[[eE]\*\] rabbitmq_management '
    - require:
      - service: rabbitmq-server

# Note, for web interface, an admin user must be created:
# rabbitmqctl add_user admin <password>
# rabbitmqctl set_user_tags admin administrator
