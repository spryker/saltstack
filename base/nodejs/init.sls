#
# Install NodeJS
#
nodejs:
  pkg.installed

# Include autoupdate if configured to do so
{% if salt['pillar.get']('autoupdate:nodejs', False) %}
include:
  - .update
{% endif %}
