#zippy
---
Zippy is a practical application of Vagrant and Ansible, for portable auto-deployments.

The idea is a zero-to-hero LNMP stack running from vagrant up.

The current target is Ubuntu LTS releases (Debian stable for the dev branch) running wordpress.

---
##Notes!
---

            .--.           ____________     _        _      _       _
           |o_o |         |_____  _____|   | |      | |    \ \     / /
           |:_/ |              |  |        | |      | |     \ \   / /
          //   \ \             |  |        | |      | |      \_\_/_/
         (|     | )            |  |        | |      | |      / / \ \
        /'\_   _/`\            |  |        | |______| |     / /   \ \
        \___)=(___/            |__|        |__________|    /_/     \_\


http://vagrantbox.es has a list of vagrant boxes available

We currently use these boxes:

    ##master
    http://cloud-images.ubuntu.com/vagrant/precise/current/precise-server-cloudimg-amd64-vagrant-disk1.box
    ##dev
    http://puppet-vagrant-boxes.puppetlabs.com/debian-70rc1-x64-vbox4210-nocm.box

You may run this command to add the box manually, but vagrant up will download and enable it for you:

    ##master
    vagrant box add precise64 http://cloud-images.ubuntu.com/vagrant/precise/current/precise-server-cloudimg-amd64-vagrant-disk1.box
    ##dev
    vagrant box add wheezy64 http://puppet-vagrant-boxes.puppetlabs.com/debian-70rc1-x64-vbox4210-nocm.box


To install ansible from git use:

    sudo pip install git+https://github.com/ansible/ansible.git


###################


current command set to get rockin' (you need: ansible (1.4.x), git, vagrant & virtualbox on the host machine):

    git clone https://github.com/milojennings/zippy.git
    cd zippy
    vagrant plugin install vagrant-vbguest --plugin-version 0.10.pre0 --plugin-prerelease --plugin-source https://rubygems.org
    vagrant plugin install vagrant-cachier
    vagrant plugin install vagrant-hostsupdater
    vagrant up


###################

###Vagrant usage:

-vagrant up only needs to be done once (unless you reboot)
-use vagrant provision if changes are made to the ansible playbook(s)
-use vagrant reload if changes are made to the Vagrantfile

note that vbguest may bark back an error:

    Installing the Window System drivers ...fail!
    (Could not find the X.Org or XFree86 Window System.)
    An error occurred during installation of VirtualBox Guest Additions ...

There is nothing to worry about though, as our server is headless (display server is not used).
