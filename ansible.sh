#!/usr/bin/env bash

# Bootstrap the vagrant VM by installing Ansible and
# letting ansible do the provisioning in local connection mode
if [ -f ~/runonce ]
  then
  echo "already provisioned ansible"
fi
# Only run the script when first creating the virtual machine to save time
if [ ! -f ~/runonce ]
then
  sudo apt-get update
  sudo apt-get install -y python-software-properties
  sudo add-apt-repository -y ppa:rquillo/ansible
  sudo apt-get update
  sudo apt-get install -y ansible
  cp /vagrant/playbooks/hosts /home/vagrant/
  chmod 666 /home/vagrant/hosts

  touch ~/runonce
fi

#always provision ansible playbook
sudo ansible-playbook /vagrant/playbooks/main.yml -i /home/vagrant/hosts --connection=local