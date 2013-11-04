#!/usr/bin/env ruby
# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  # Build a local cache of apt packages to save time rebuilding VM
  # Requires https://github.com/fgrehm/vagrant-cachier
  config.cache.enable :apt

  config.vm.network :private_network, ip: "11.22.33.44"
  config.vm.network :forwarded_port, guest: 80, host: 8080

  config.vm.provider :virtualbox do |vb|
    #   # Don't boot with headless mode
    #   vb.gui = true
    vb.customize ["modifyvm", :id, "--memory", "512"]
  end

  # Settings for vbguest plugin
  config.vbguest.auto_update = true
  config.vbguest.no_remote = false

  # Drive mapping
  #
  # The following config.vm.synced_folder settings will map directories in your Vagrant
  # virtual machine to directories on your local machine. Once these are mapped, any
  # changes made to the files in these directories will affect both the local and virtual
  # machine versions. Think of it as two different ways to access the same file. When the
  # virtual machine is destroyed with `vagrant destroy`, your files will remain in your local
  # environment.


  # /var/www/
  config.vm.synced_folder "vhosts/", "/var/www/", :owner => "www-data"

  # /srv/database/
  #
  # If a database directory exists in the same directory as your Vagrantfile,
  # a mapped directory inside the VM will be created that contains these files.
  # This directory is used to maintain default database scripts as well as backed
  # up mysql dumps (SQL files) that are to be imported automatically on vagrant up

  config.vm.synced_folder "database/", "/srv/database"
  if vagrant_version >= "1.3.0"
    config.vm.synced_folder "database/data/", "/var/lib/mysql", :mount_options => [ "dmode=777", "fmode=777" ]
  else
    config.vm.synced_folder "database/data/", "/var/lib/mysql", :extra => 'dmode=777,fmode=777'
  end


  # Provision using Ansible
  #
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "provisions/main.yml"
    ## ansible output is limited when used inside of vagrant, this is only an issue when things are broken, increase to 4 v's for maximum verbosity
    ansible.verbose = "vv"
    ansible.sudo = "true"
    ansible.host_key_checking = "false"
    # ansible.inventory_path = ""
  end


  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  # config.ssh.forward_agent = true

end