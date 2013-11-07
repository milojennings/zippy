#!/usr/bin/env ruby
# -*- mode: ruby -*-
# vi: set ft=ruby :

# Set variables so scripts can know where they are executing from
dir = Dir.pwd
vagrant_dir = File.expand_path(File.dirname(__FILE__))

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Store the current version of Vagrant for use in conditionals when dealing
  # with possible backward compatible issues.
  vagrant_version = Vagrant::VERSION.sub(/^v/, '')



  config.vm.box = "wheezy64"
  config.vm.box_url = "https://bitbucket.org/ryanpcmcquen/zippybox/downloads/vagrant-wheezy64-zippy.box"

  # config.vm.box = "precise64"
  # config.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/precise/current/precise-server-cloudimg-amd64-vagrant-disk1.box"

  # Build a local cache of apt packages to save time rebuilding VM
  # Requires https://github.com/fgrehm/vagrant-cachier
  ### i'm not sure this is faster  ## -ryan
  # config.cache.enable :apt

  config.vm.provider :virtualbox do |vb|
    #   # Don't boot with headless mode
    #   vb.gui = true
    ## this gobble-dy-gook may fix errors on some host machines
    # vb.customize ["modifyvm", :id, "--rtcuseutc", "on"]
    vb.customize ["modifyvm", :id, "--memory", "512"]
  end

  ## 10.0.0.0 to 10.255.255.255 are reserved for private networks, best to use one of those
  config.vm.network :private_network, ip: "10.20.30.40"
  config.vm.network :forwarded_port, guest: 80, host: 8080

  # # Settings for vbguest plugin, should not be needed for wheezy box
  # config.vbguest.auto_update = true
  # config.vbguest.no_remote = false
  # config.vbguest.installer = "CloudUbuntuVagrant"

  # Drive mapping
  #
  # The following config.vm.synced_folder settings will map directories in your Vagrant
  # virtual machine to directories on your local machine. Once these are mapped, any
  # changes made to the files in these directories will affect both the local and virtual
  # machine versions. Think of it as two different ways to access the same file. When the
  # virtual machine is destroyed with `vagrant destroy`, your files will remain in your local
  # environment.


  # /var/www/
  config.vm.synced_folder "vhosts/", "/var/www/", owner: "www-data"
  # config.vm.synced_folder "vhosts/", "/var/www/", nfs: true


  # # ~/ ## this is broken for now
  # config.vm.synced_folder "vagranthome/", "/home/vagrant/"

  # /srv/database/
  #
  # If a database directory exists in the same directory as your Vagrantfile,
  # a mapped directory inside the VM will be created that contains these files.
  # This directory is used to maintain default database scripts as well as backed
  # up mysql dumps (SQL files) that are to be imported automatically on vagrant up

  config.vm.synced_folder "database/", "/srv/database"
  if vagrant_version >= "1.3.0"
    config.vm.synced_folder "database/data/", "/var/lib/mysql", mount_options: [ "dmode=777", "fmode=777" ]
  else
    config.vm.synced_folder "database/data/", "/var/lib/mysql", extra: 'dmode=777,fmode=777'
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


  # Local Machine Hosts
  #
  # Harvested from: https://github.com/10up/varying-vagrant-vagrants/blob/master/Vagrantfile
  #
  # If the Vagrant plugin hostsupdater (https://github.com/cogitatio/vagrant-hostsupdater) is
  # installed, the following will automatically configure your local machine's hosts file to
  # be aware of the domains specified below. Watch the provisioning script as you may be
  # required to enter a password for Vagrant to access your hosts file.
  
  if defined? VagrantPlugins::HostsUpdater

    # Capture the paths to all vvv-hosts files under the www/ directory.
    paths = [vagrant_dir + '/vhosts/vhosts']
    # Dir.glob(vagrant_dir + '/vhosts/vhosts').each do |path|
    #   paths << path
    # end

    # Parse through the vvv-hosts files in each of the found paths and put the hosts
    # that are found into a single array.
    hosts = []
    paths.each do |path|
      new_hosts = []
      file_hosts = IO.read(vagrant_dir + '/vhosts/vhosts').split( "\n" )
      file_hosts.each do |line|
        if line[0..0] != "#"
          new_hosts << line
        end
      end
      hosts.concat new_hosts
    end

    # Pass the final hosts array to the hostsupdate plugin so it can perform magic.
    config.hostsupdater.aliases = hosts

  end
  
  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  # config.ssh.forward_agent = true

end