<?php
define('DB_NAME', 'rsmm');
define('DB_USER', 'vagrant');
define('DB_PASSWORD', 'vagrant');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('AUTH_KEY',         'fN`-rBkV(`5)6+ip6aO,FTIwS=^YM+l8I(!pW{_GSpTA?DM|<0O8+59yiT %/GIU');
define('SECURE_AUTH_KEY',  '^|N$h+iRs7zyWeY@xmyj-K4OMT|V[~fd$*@e@t-~%p^Ftzzz*0FI^xg-L|^b}R)Z');
define('LOGGED_IN_KEY',    '[1!;uWUx,4i&)l$e+Qc9+3Q|k/kODWA eXDe,a{R|.D+fBWvTGzy5T+`6t~?|Cb/');
define('NONCE_KEY',        'Ai/A8G2uqrwh/5x]?FnWK~~+XkLPCH@gMOQ]14,8y#<Vz4Dy_Z7e-0<w0GnK7;`=');
define('AUTH_SALT',        'm.]<)qDUXX?-1co])ZC^PZFepd=``o.IWwa{-8Lz52r<.3yy,N2hUl.%pefsW,hI');
define('SECURE_AUTH_SALT', '-nQb g:=W!-U-2@_:J:XHO@=5xcf$}P^UoTXW, _~Uu=5C,CmW/R=vV6I4_g= z=');
define('LOGGED_IN_SALT',   ']G~~Q{DtaNDT;5*2OwOP ; `Q9f9*xMCOi5,~X$-n[7^8qD[C*N[M7bhGrZ |BFz');
define('NONCE_SALT',       'Wu@W-2:V$UA}WNp_!`]j]G>j+}d{vF|L>#ydAxJ+$gu,vcBE<c*JK+&H%hyt--| ');

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