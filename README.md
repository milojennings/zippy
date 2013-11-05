#zippy
---
Zippy is a practical application of Vagrant and Ansible, for portable auto-deployments.

The idea is a zero-to-hero LNMP stack running from vagrant up.

The current target is Ubuntu LTS releases running wordpress.

---
##Notes!
---

            .--. 
           |o_o | 
           |:_/ | 
          //   \ \ 
         (|     | ) 
        /'\_   _/`\ 
        \___)=(___/ 


vagrantbox.es has a list of vagrant boxes available

We currently use this box:
    http://cloud-images.ubuntu.com/vagrant/precise/current/precise-server-cloudimg-amd64-vagrant-disk1.box

You may run this command to add the box manually, but vagrant up will download and enable it for you:
    vagrant box add precise64 http://cloud-images.ubuntu.com/vagrant/precise/current/precise-server-cloudimg-amd64-vagrant-disk1.box

We may consider upgrading to the next Ubuntu LTS release when that arrives (14.04)

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

vagrant up only needs to be done once (unless you reboot), vagrant provision should be used if changes are made in ansible, use vagrant reload if changes are made to the Vagrantfile

note that vbguest may bark back an error:

    Installing the Window System drivers ...fail!
    (Could not find the X.Org or XFree86 Window System.)
    An error occurred during installation of VirtualBox Guest Additions 4.3.0. Some functionality may not work as intended.

There is nothing to worry about though, as our server is headless (display server is not used).