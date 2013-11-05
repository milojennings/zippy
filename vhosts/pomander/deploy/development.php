<?php

$env->load('Wordpress');
$env->deploy_to('/var/www/custom.roadsideweb.dev/public_html');

$env->wordpress(array(
  'version'   => '3.7.1',
  'db_prefix' => 'wp_',
  'base_uri'  => ''
));

$env->plugins(array(
  // fetches from plugins.wordpress.org
  'advanced-custom-fields' => array('version' => 'latest'),

  // fetches from local folder
  'gravityforms' => array('dir' => 'lib/gravityforms')

  // fetches from git repository
  // 'wp-github-activity' => array('branch' => 'origin/master' => 'git' => 'https://github.com/alexkingorg/wp-github-activity'),

  // fetches from svn repository
  // 'more-types' => array('version' => '2.1', 'svn' => 'http://plugins.svn.wordpress.org/more-fields' )

));
