<?php
define('DB_NAME', 'rsmm');
define('DB_USER', 'vagrant');
define('DB_PASSWORD', 'vagrant');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('AUTH_KEY',         'g`h+11K,j* /}`a45kv7,lng~ElJ8)A0^VYG9|YHHq<F7{]zZhC|+8MUPGu5P=+3');
define('SECURE_AUTH_KEY',  '6H||u[<u<}Q u_r?mlt_:/]d}=8] HQP8DGO)aK}f5p5a.1Q0Mcuz^TT?Xx]C77~');
define('LOGGED_IN_KEY',    'Hq(gBu/(P~7Z*BF3WR=^=7U4KM!-:{s8Bq:#;l6@;(TpdJRC/c6j[7xjBI`_XjdU');
define('NONCE_KEY',        'q5C@T&1MIW*~&Kztxq8f@1,t;x|$-=Sc>VAQ|`X<}s+E2i{hI4);./!|=P)Pz<:A');
define('AUTH_SALT',        ':l^(>`h?@+ z}xLgC9,2 (jhP*IE%[j1C2+y%@jy]9B;;cA=v+GU4&Hdg`@dBT$]');
define('SECURE_AUTH_SALT', 'DR|9(`|Bm2j=@]oBx@*h[cFS&E#kx4RyVE+*[twvhNI5g%xWgo{[9MstpUR.V~oJ');
define('LOGGED_IN_SALT',   'e~W5QRulT/-OFB~ZB//r6_PWK|}83Ee^m}x.y@~i^n5+pEuqJ&#R$njc{NNg+z~N');
define('NONCE_SALT',       'Bs{PyIsniU~53TQZA~L8c3KWVzt~!z2gv/mhY$bII:,{/we2cJ*7G.$4.U%ZZo++');

$table_prefix = 'wp_';
define ('WPLANG', '');
if( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__).'/wordpress/');
define('WP_SITEURL', 'http://'.$_SERVER['SERVER_NAME'].'');
define('WP_CONTENT_DIR', ABSPATH.'public');
define('WP_CONTENT_URL', WP_SITEURL.'/public');
define('WP_PLUGIN_DIR', dirname(__FILE__.'../').'/vendor/plugins');
define('WP_PLUGIN_URL', WP_SITEURL.'/vendor/plugins');
define('PLUGINDIR', WP_PLUGIN_DIR);

require_once(ABSPATH . 'wp-settings.php');
?>