# This file is maintained by Salt!
# local modifications to this file will be preserved - if this file exists,
# salt will not overwrite it.

ZSH=$HOME/.oh-my-zsh
ZSH_THEME="robbyrussell"
plugins=(composer git redis-cli spryker sudo)
source $ZSH/oh-my-zsh.sh
export PS1='%n@%m ${ret_status}%{$fg_bold[green]%}%p %{$fg[cyan]%}%c %{$fg_bold[blue]%}$(git_prompt_info)%{$fg_bold[blue]%} % %{$reset_color%}'
export LC_ALL="en_US.UTF-8"
if [ "$LC_CTYPE" = "UTF-8" ]; then export LC_CTYPE=C; fi

