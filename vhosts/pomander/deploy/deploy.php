$env->database(array(
    'name' => 'my_wordpress',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'charset' => 'utf8'
));

$env->wordpress(array(
    'version' => '3.7.1',
    'db_prefix' => 'wp_',
    'base_uri' => ''
));

$env->plugins(array(
    'advanced-custom-fields' => array('version' => 'latest'),
    'gravityforms' => array('dir' => 'lib/gravityforms')
));