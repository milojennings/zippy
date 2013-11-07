<?php
define('DB_NAME', 'rsmm');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('AUTH_KEY',         'qY7=Hc[]naSA)>H~UVO.36C|+XaV~M$ M;eY)n:Bw!)t`#}O=BL+[(]Jxm(`0$)C');
define('SECURE_AUTH_KEY',  'f ^**GcLVF/*#h,s|=oB|Wsb6^d6.af{7w3qmtR_MXM-jIuI$@/mVSAJvySQW9)/');
define('LOGGED_IN_KEY',    'ipT*0P_~a5fmVj_^/.jga&uhr}W1-dhh<d76]Hx[-rZ;xGO.ZqsGXcGaCM@9YMXI');
define('NONCE_KEY',        '&Bg~< [$H]*de>-pG8a(b+A-O2lo^cz2WOjLms-z1rxHL/=qfS+}r}`Zt!i]HQ3]');
define('AUTH_SALT',        '1^vx a8MYTb~kjHdX+<er&&m(P+PXvdxId|+WCA#-@}ibiy<U.yvk#Y~>81w=m,P');
define('SECURE_AUTH_SALT', 'yR-^N`JlWOQhpbM.itG4+%d(`=TKhi.#[th{zxX|6AWMK4Gw<;-Oan`yi-|)]a?;');
define('LOGGED_IN_SALT',   '#/Ss5Up[4}R;}{a._R=cjLBY|q(H- 3z3RL*n+e|WFXC_Osy kEMY|33ZkU{4`-`');
define('NONCE_SALT',       '_yLkkK#IW~|o_U #w%%X,Z]t{qc-6eOY-A%I6ldr2z>6R:.i&e4p5$|4MI=IH^iL');

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