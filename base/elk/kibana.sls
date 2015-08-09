#
# Setup and run kibana
#
# We are using the easiest option, so start Kibana which is bundled together with Logstash

{%- if salt['pillar.get']('elk:enabled', "False") %}

logstash-kibana-package:
  pkg:
    - installed
    - name: logstash

logstash-web:
  service.running:
    - enable: true
    - require:
      - pkg: logstash-kibana-package

{%- endif %}
