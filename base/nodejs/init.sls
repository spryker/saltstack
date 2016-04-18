#
# Install NodeJS and npm modules in global mode
#

nodejs:
  pkg.installed

# Include autoupdate if configured to do so
{% if salt['pillar.get']('autoupdate:nodejs', False) %}
include:
  - .update
{% endif %}
