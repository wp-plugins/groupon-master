<?php
/**
Plugin Name: Groupon Master
Plugin URI: http://wordpress.techgasp.com/groupon-master/
Version: 4.3.5
Author: TechGasp
Author URI: http://wordpress.techgasp.com
Text Domain: groupon-master
Description: Easy to use bombastic plugin that will be a great source of income for any wordpress webmaster. Groupon Master.
License: GPL2 or later
*/
/*
Copyright 2013 TechGasp  (email : info@techgasp.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('groupon_master')) :
///////DEFINE ID//////
define('GROUPON_MASTER_ID', 'groupon-master');
///////DEFINE VERSION///////
define( 'groupon_master_VERSION', '4.3.5' );
global $groupon_master_version, $groupon_master_name;
$groupon_master_version = "4.3.5"; //for other pages
$groupon_master_name = "Groupon Master"; //pretty name
if( is_multisite() ) {
update_site_option( 'groupon_master_installed_version', $groupon_master_version );
update_site_option( 'groupon_master_name', $groupon_master_name );
}
else{
update_option( 'groupon_master_installed_version', $groupon_master_version );
update_option( 'groupon_master_name', $groupon_master_name );
}
// HOOK ADMIN
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin.php');
// HOOK ADMIN IN & UN SHORTCODE
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin-shortcodes.php');
// HOOK ADMIN WIDGETS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin-widgets.php');
// HOOK ADMIN ADDONS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin-addons.php');
// HOOK ADMIN UPDATER
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin-updater.php');
// HOOK WIDGET BUTTONS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-widget-buttons.php');
// HOOK WIDGET GROUPON DEALS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-widget-groupon-deals.php');

class groupon_master{
//REGISTER PLUGIN
public static function groupon_master_register(){
register_setting(GROUPON_MASTER_ID, 'tsm_quote');
}
public static function content_with_quote($content){
$quote = '<p>' . get_option('tsm_quote') . '</p>';
	return $content . $quote;
}
//SETTINGS LINK IN PLUGIN MANAGER
public static function groupon_master_links( $links, $file ) {
	if ( $file == plugin_basename( dirname(__FILE__).'/groupon-master.php' ) ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=groupon-master' ) . '">'.__( 'Settings' ).'</a>';
	}

	return $links;
}

public static function groupon_master_updater_version_check(){
global $groupon_master_version;
//CHECK NEW VERSION
$groupon_master_slug = basename(dirname(__FILE__));
$current = get_site_transient( 'update_plugins' );
$groupon_plugin_slug = $groupon_master_slug.'/'.$groupon_master_slug.'.php';
@$r = $current->response[ $groupon_plugin_slug ];
if (empty($r)){
$r = false;
$groupon_plugin_slug = false;
if( is_multisite() ) {
update_site_option( 'groupon_master_newest_version', $groupon_master_version );
}
else{
update_option( 'groupon_master_newest_version', $groupon_master_version );
}
}
if (!empty($r)){
$groupon_plugin_slug = $groupon_master_slug.'/'.$groupon_master_slug.'.php';
@$r = $current->response[ $groupon_plugin_slug ];
if( is_multisite() ) {
update_site_option( 'groupon_master_newest_version', $r->new_version );
}
else{
update_option( 'groupon_master_newest_version', $r->new_version );
}
}
}
		// Advanced Updater

//END CLASS
}
if ( is_admin() ){
	add_action('admin_init', array('groupon_master', 'groupon_master_register'));
	add_action('init', array('groupon_master', 'groupon_master_updater_version_check'));
}
add_filter('the_content', array('groupon_master', 'content_with_quote'));
add_filter( 'plugin_action_links', array('groupon_master', 'groupon_master_links'), 10, 2 );
endif;