#
# Setup additional debian package repositories
#

# Required for https-based repositories
apt-transport-https:
  pkg.installed

apt-get-update:
  cmd.wait:
    - name: apt-get update

# Base debian repositories
/etc/apt/sources.list:
  file.managed:
    - source: salt://system/files/etc/apt/sources.list
    - template: jinja
    - watch_in:
       - cmd: apt-get-update

# Additional software repositories
dotdeb:
  pkgrepo.managed:
    - humanname: DotDeb repo ({{ grains.lsb_distrib_codename }})
    - name: deb http://packages.dotdeb.org {{ grains.lsb_distrib_codename }} all
    - file: /etc/apt/sources.list.d/dotdeb.list
    - key_url: http://www.dotdeb.org/dotdeb.gpg
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

{%- if grains.lsb_distrib_codename == "wheezy" %}
dotdeb-php56:
  pkgrepo.managed:
    - humanname: DotDeb PHP-5.6 repo ({{ grains.lsb_distrib_codename }})
    - name: deb http://packages.dotdeb.org {{ grains.lsb_distrib_codename }}-php56 all
    - file: /etc/apt/sources.list.d/dotdeb-php56.list
    - key_url: http://www.dotdeb.org/dotdeb.gpg
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update
{%- endif %}

elasticsearch-repo:
  pkgrepo.managed:
    - humanname: Official Elasticsearch Repository
    - name: deb http://packages.elasticsearch.org/elasticsearch/{{ salt['pillar.get']('elasticsearch:version', '1.4') }}/debian stable main
    - file: /etc/apt/sources.list.d/elasticsearch.list
    - key_url: http://packages.elasticsearch.org/GPG-KEY-elasticsearch
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

logstash-repo:
  pkgrepo.managed:
    - humanname: Official Logstash Repository
    - name: deb http://packages.elasticsearch.org/logstash/{{ salt['pillar.get']('logstash:version', '1.4') }}/debian stable main
    - file: /etc/apt/sources.list.d/logstash.list
    - key_url: http://packages.elasticsearch.org/GPG-KEY-elasticsearch
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

{{ grains.lsb_distrib_codename }}-backports-repo:
  pkgrepo.managed:
    - humanname: Debian {{ grains.lsb_distrib_codename }} Backports repository
    - name: deb http://ftp.uk.debian.org/debian {{ grains.lsb_distrib_codename }}-backports main
    - file: /etc/apt/sources.list.d/backports.list
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

nodesource-node-repo:
  pkgrepo.managed:
    - humanname: NodeSource NodeJS repository
    - name: deb https://deb.nodesource.com/node012 {{ grains.lsb_distrib_codename }} main
    - file: /etc/apt/sources.list.d/nodesource-node.list
    - key_url: https://deb.nodesource.com/gpgkey/nodesource.gpg.key
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

jenkins-repo:
  pkgrepo.managed:
    - humanname: Jenkins repository
    - name: deb http://pkg.jenkins-ci.org/debian binary/
    - file: /etc/apt/sources.list.d/jenkins.list
    - key_url: http://pkg.jenkins-ci.org/debian/jenkins-ci.org.key
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

postgresql-repo:
  pkgrepo.managed:
    - humanname: Postgresql repository ({{ grains.lsb_distrib_codename }})
    - name: deb http://apt.postgresql.org/pub/repos/apt/ {{ grains.lsb_distrib_codename }}-pgdg main
    - file: /etc/apt/sources.list.d/postgresql.list
    - key_url: http://apt.postgresql.org/pub/repos/apt/ACCC4CF8.asc
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

rabbitmq-repo:
  pkgrepo.managed:
    - humanname: RabbitMQ repository
    - name: deb http://www.rabbitmq.com/debian/ testing main
    - file: /etc/apt/sources.list.d/rabbitmq.list
    - key_url: https://www.rabbitmq.com/rabbitmq-signing-key-public.asc
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update

git-repo:
  pkgrepo.managed:
    - humanname: Official Git Ubuntu Repository
    - name: deb http://ppa.launchpad.net/git-core/ppa/ubuntu lucid main
    - file: /etc/apt/sources.list.d/git.list
    - keyid: E1DF1F24
    - keyserver: keyserver.ubuntu.com
    - refresh_db: False
    - watch_in:
       - cmd: apt-get-update
