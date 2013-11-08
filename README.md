#zippy
---
Zippy is a practical application of Vagrant, Ansible, and Pomander for portable auto-deployments.

The idea is a zero-to-hero LNMP stack running from vagrant up.

Our original target was Ubuntu LTS releases, but due to a significant ram difference, is now Debian stable.

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

We currently use this box:

    https://bitbucket.org/ryanpcmcquen/zippybox/downloads/vagrant-wheezy64-zippy.box

You may run this command to add the box manually, but vagrant up will download and enable it for you:

    vagrant box add wheezy64 https://bitbucket.org/ryanpcmcquen/zippybox/downloads/vagrant-wheezy64-zippy.box


To install ansible from git use:

    sudo pip install git+https://github.com/ansible/ansible.git


###################

You need:

-git

-virtualbox

-vagrant

-ansible (1.4.x)


current command set to get rockin':

    git clone https://github.com/milojennings/zippy.git
    cd zippy
    ### unfortunately vagrant plugin install can only take one argument  :-(
    vagrant plugin install vagrant-vbguest
    vagrant plugin install vagrant-cachier
    vagrant plugin install vagrant-hostsupdater
    vagrant up


###################

###Vagrant usage:

-vagrant up only needs to be done once (unless you reboot)
-use vagrant provision if changes are made to the ansible playbook(s)
-use vagrant reload if changes are made to the Vagrantfile

Note that vbguest may bark an error:

    Installing the Window System drivers ...fail!
    (Could not find the X.Org or XFree86 Window System.)
    An error occurred during installation of VirtualBox Guest Additions ...

There is nothing to worry about though, as our server is headless (display server is not used).


If you are getting this error on Mac OS:

    Progress state: NS_ERROR_FAILURE
    VBoxManage: error: Failed to create the host-only adapter
    VBoxManage: error: VBoxNetAdpCtl:
    Error while adding new interface: failed to open /dev/vboxnetctl: No such file or directory

Try running this:

    sudo /Library/StartupItems/VirtualBox/VirtualBox restart

---

