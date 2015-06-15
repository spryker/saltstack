# Creating new Spryker project

1. Clone `spryker` code repository

1. Clone `saltstack` and `pillar` reference repositories. You should use names like `saltstack-PROJECT` and `pillar-PROJECT-dev` - where PROJECT is the project name (e.g. `toys`).
Keep those repositories private. In future you will have more than one pillar repository - i.e. seperate for dev (development VMs), for qa (testing systems) and for production.
You can always merge changes from the reference repositories, but from the beginning you should not use reference repositories directly.

1. Edit the `Vagrantfile` in your Spryker repository:
  1. Change `VM_IP` parameter - use any other value other than the default one. You should pick up an address somewhere inside 10.0.0.0/8 network, which does not collide with your
  office / server address spaces. For example, you can use `10.10.1.34`.
  1. Adjust the values of `SALT_REPOSITORY` and `PILLAR_REPOSITORY` variables, so that they point to repositories you just created.

1. Generate new SSH keys for checking out code:
  1. Create a temporary directory on your hard drive. In this directory create set of SSH keys, without password:
    ```
    $ mkdir temp; cd temp
    $ ssh-keygen -N '' -f deployment -C 'spryker-deployment-PROJECT'
    ```
  1. Copy the private key from file `deployment` to repository `saltstack`, file `base/spryker/files/etc/deploy/deploy.key`
  1. Upload the public key from file `deployment.pub` to your `spryker` git repository as read-only deployment key. In GitHub you can do that by selecting your spryker repository,
  then clicking on `Settings` and then on `Deploy keys`.

1. Generate new SSH keys for inter-server deployment connections. Note that `pillar-dev`, `pillar-qa` and `pillar-prod` repositories
  should all have different keys - you want to give access to production system only to limited amount of people. Keep those keys very
  secret, as they allow critical access to your severs.
  1. To generate dev key, use the following commands:
    ```
    $ cd temp
    $ ssh-keygen -N '' -f dev -C 'spryker-dev'
    ```
  1. Copy the contents of private key from file `dev` and paste them to your pillar repository, into file `dev/app/init.sls`,
  as key `server_env:ssh:id_rsa`. Watch out for correct indentations in the yaml file! E.g.:
    ```
    server_env:
      ssh:
        id_rsa: |
          -----BEGIN RSA PRIVATE KEY-----
          XXxxXXxxXXxxXXxxXXxxXXxxXXxxXXxxXXxx
          -----END RSA PRIVATE KEY-----
    ```

1. Remove the temporary directory with key files from your local hard drive:
  ```
  $ rm -ri temp
  remove temp/deployment? y
  remove temp/deployment.pub? y
  remove temp/dev? y
  remove temp/dev.pub? y
  remove temp? y
  ```

