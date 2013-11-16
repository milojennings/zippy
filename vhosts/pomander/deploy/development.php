<?php

$env->load('Wordpress');
$env->deploy_to('/var/www/default/public_html/');

$env->wordpress(array(
  'version'   => '3.7.1',
  'db_prefix' => 'wp_',
  'base_uri'  => ''
));

$env->plugins(array(
  // fetches from plugins.wordpress.org
  // 'advanced-custom-fields' => array('version' => 'latest'),

  // fetches from local folder
  // 'gravityforms' => array('dir' => 'lib/gravityforms')

  // fetches from git repository
  // 'wp-github-activity' => array('branch' => 'origin/master' => 'git' => 'https://github.com/alexkingorg/wp-github-activity'),

  // fetches from svn repository
  // 'more-types' => array('version' => '2.1', 'svn' => 'http://plugins.svn.wordpress.org/more-fields' )

));

// $env->db_swap_url(true);

$env->database(array(
    'name' => 'zippy',
    'user' => 'root',
    'password' => '',
    'host' => 'default',
    'charset' => 'utf8'
));


// $app = builder()->get_application();
// // $secret_keys = file_get_contents("https://api.wordpress.org/secret-key/1.1/salt/");
// // $cache = isset($app->env->wordpress["cache"])? "define('WP_CACHE', {$app->env->wordpress["cache"]});" : "";
// $siteurl = isset($app->env->wordpress["url"])? "'{$app->env->wordpress["url"]}'":"'http://'.\$_SERVER['SERVER_NAME']";
// $siteurl .= isset($app->env->wordpress["base_uri"])? ".'{$app->env->wordpress["base_uri"]}'" : "";
