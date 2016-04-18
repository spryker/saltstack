#
# Install Java Runtime Environment - OpenJDK version 7
#
# In high-performance, big scale setups, it is recommended to use Oracle Java 8, which because of license limitations,
# has to be downloaded directly from Oracle
#

java:
  pkg.installed:
    - name: openjdk-8-jre
  alternatives.set:
    - name: java
    - path: /usr/lib/jvm/java-8-openjdk-amd64/jre/bin/java
    - require:
      - pkg: openjdk-8-jre
