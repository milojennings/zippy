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


  config.vm.box = "wheezy64-lemp"
  config.vm.box_url = "https://bitbucket.org/roadsidemultimedia/zippy/downloads/zippy-wheezy64-lemp.box"

  config.vm.synced_folder ".", "/vagrant", nfs: true



###################
## =>  LOCAL  <= ##
###################

config.vm.define "local" do |local|

  local.vm.box = "wheezy64-lemp"
  local.vm.box_url = "https://bitbucket.org/roadsidemultimedia/zippy/downloads/zippy-wheezy64-lemp.box"
  local.vm.provider :virtualbox do |vb|
    local.vm.synced_folder "vhosts/", "/var/www", nfs: true

    ## 10.0.0.0 to 10.255.255.255 are reserved for private networks, best to use one of those
    local.vm.network :private_network, ip: "10.20.30.40"
    local.vm.network :forwarded_port, guest: 80, host: 8080
    local.vm.network :forwarded_port, guest: 443, host: 8443
    vb.customize ["modifyvm", :id, "--memory", "512"]

    local.vm.provision "ansible" do |ansible|
      ansible.playbook = "provisions/local.yml"
      ansible.verbose = "vvvv"
      ansible.sudo = "true"
      ansible.host_key_checking = "false"
    end

    if defined? VagrantPlugins::HostsUpdater
      # Capture the paths to all vvv-hosts files under the www/ directory.
      paths = [vagrant_dir + '/vhosts/vhosts']
      # Dir.glob(vagrant_dir + '/vhosts/vhosts').each do |path|
      #   paths << path
      # end
      # Parse through the vhosts files in each of the found paths and put the hosts
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
  end
end




###################
## => STAGING <= ##
###################

config.vm.define "staging" do |staging|
  # staging.vm.box="default"
  staging.ssh.private_key_path = '~/.ssh/id_rsa'
  # staging.vm.box = "wheezy64-lemp"
  # staging.vm.box_url = "https://bitbucket.org/roadsidemultimedia/zippy/downloads/zippy-wheezy64-lemp.box"
  staging.vm.provider :digital_ocean do |provider, override|


    provider.image = "Debian 7.0 x64"
    provider.size = "512MB"
    provider.ca_path = "/usr/local/opt/curl-ca-bundle/share/ca-bundle.crt"

    provider.api_key = ''
    provider.client_id = ''

    staging.vm.provision "ansible" do |ansible|
      ansible.playbook = "provisions/staging.yml"
      ansible.verbose = "vvvv"
      ansible.sudo = "true"
      ansible.host_key_checking = "false"
    end

  end
end


end
