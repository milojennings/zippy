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

  config.vm.synced_folder "vhosts/", "/var/www/", :owner => "www-data"
  # config.vm.synced_folder "database/", "/srv/database"
  # config.vm.synced_folder "database/data/", "/var/lib/mysql", :extra => 'dmode=777,fmode=777'

  # config.vm.provision :shell, :path => "ansible.sh"

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