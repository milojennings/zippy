#zippy
---
Zippy is a practical application of Vagrant, Ansible, and Pomander for portable auto-deployments.

The idea is a zero-to-hero LNMP stack running from vagrant up.

Our original target was Ubuntu LTS releases, but due to a significant ram difference, is now Debian stable.

---
##Notes!
---

    :::text
        .--.           ____________     _        _      _       _
       |o_o |         |_____   ____|   | |      | |    \ \     / /
       |:_/ |              |  |        | |      | |     \ \   / /
      //   \ \             |  |        | |      | |      \_\_/_/
     (|     | )            |  |        | |      | |      / / \ \
    /'\_   _/`\            |  |        | |______| |     / /   \ \
    \___)=(___/            |__|        |__________|    /_/     \_\


http://vagrantbox.es has a list of vagrant boxes available

We currently use our own custom box for local development:

    :::text
    http://softlayer-dal.dl.sourceforge.net/project/zippybox/zippy-wheezy64-lemp.box

You may run this command to add the box manually, but vagrant up will download and enable it for you:

    :::text
    vagrant box add wheezy64-lemp http://softlayer-dal.dl.sourceforge.net/project/zippybox/zippy-wheezy64-lemp.box



###################

You need:

- git
- virtualbox
- vagrant
- ansible


current command set to get rockin':

    :::text
    git clone https://bitbucket.org/roadsidemultimedia/zippy.git
    cd zippy
    ### unfortunately vagrant plugin install can only take one argument  :-(
        ### if you need to install a pre-release or different verison, do it like so:
        ## vagrant plugin install vagrant-vbguest --plugin-version 0.10.0.pre1 --plugin-source https://rubygems.org
    vagrant plugin install vagrant-vbguest
    vagrant plugin install vagrant-digitalocean
    vagrant plugin install vagrant-hostsupdater
    vagrant up


###################

###Vagrant usage:

- vagrant up only needs to be done once (unless you reboot)
- use vagrant provision if changes are made to the ansible playbook(s)
- use vagrant reload if changes are made to the Vagrantfile

Note that vbguest may bark an error:

    :::text
    Installing the Window System drivers ...fail!
    (Could not find the X.Org or XFree86 Window System.)
    An error occurred during installation of VirtualBox Guest Additions ...

There is nothing to worry about though, as our server is headless (display server is not used).


If you are getting this error on Mac OS:

    :::text
    Progress state: NS_ERROR_FAILURE
    VBoxManage: error: Failed to create the host-only adapter
    VBoxManage: error: VBoxNetAdpCtl:
    Error while adding new interface: failed to open /dev/vboxnetctl: No such file or directory

Try running this:

    :::text
    sudo /Library/StartupItems/VirtualBox/VirtualBox restart

---

