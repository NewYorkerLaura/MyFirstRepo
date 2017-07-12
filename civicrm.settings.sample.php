<?php
//add URL preferences override at top of file.  (remember to replace domain and paths to match the server setup)

global $civicrm_setting;
$civicrm_setting['URL Preferences']['userFrameworkResourceURL'] = 'https://bcellc.cc/wp-content/plugins/civicrm/civicrm/';

/*
replace
if (!defined('CIVICRM_UF_BASEURL')) {
  define( 'CIVICRM_UF_BASEURL'      , 'https://wpmaster.test');
}

With The following (remember to replace domain and paths to match the server setup)
*/

if (!defined('CIVICRM_UF_WP_BASEURL')) {
  define( 'CIVICRM_UF_WP_BASEURL'      , 'https://bcellc.cc/');
}
if (!defined('CIVICRM_UF_BASEURL')) {
  define( 'CIVICRM_UF_BASEURL'      , 'https://bcellc.cc/wp/');
}
if (!defined('CIVICRM_UF_ADMINURL')) {
  define( 'CIVICRM_UF_ADMINURL' , 'https://bcellc.cc/wp/wp-admin/' );
}