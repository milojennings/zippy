<?php

$env->load('Wordpress')
    ->deploy_to('/var/www/custom.roadsideweb.dev/public_html')
;

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



//<?php

//$env->repository('set your repository location here')
  //  ->url('set your application url here')
    //->releases(true)
    //->keep_releases(5)
    //->user('set your ssh user')
    //->scm('set your scm. defaults to git')
    //->revision('')
    //
    //->backup(true)
//;

//
// If you are deploying your application to a remote server:
//
//$env->deploy_to('set your application location on server');
//$env->app(array(             // Your application server(s) host or IP 
//      'your app-server here'
//));

// If you are deploying your application to a remote server,
// and using a database:
//$env->db(array(              // Your database server(s) host or IP
//      'your db-server here'
//));

// If your app uses a database uncomment this:
//$env->database(array(
        //'name' => '',
        //'user' => '',
        //'password' => '',
        //'host' => '127.0.0.1',
        //'charset' => 'utf8'
//));