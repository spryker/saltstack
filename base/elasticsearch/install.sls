#
# Install Elasticsearch and plugins configured in pillar
#

elasticsearch-requirements:
  pkg.installed:
    - pkgs:
      - openjdk-7-jre

elasticsearch:
  pkg:
    - installed
    - require:
      - pkg: elasticsearch-requirements

# For each plugin - we need to restart Elasticsearch service on each environment
{%- for shortname, plugin in pillar.elasticsearch.plugins.items() %}
/usr/share/elasticsearch/bin/plugin -install {{ plugin.name }} {% if plugin.url is defined %}-url {{ plugin.url }} {% endif %}:
  cmd.run:
    - unless: test -d  /usr/share/elasticsearch/plugins/{{ shortname }}
    - require:
      - pkg: elasticsearch
    - watch_in:
{%- for environment, environment_details in pillar.environments.items() %}
      - service: elasticsearch-{{ environment }}
{%- endfor %}
{%- endfor %}
