<?php
/*
Plugin Name: WordPress Sample Plugin
Plugin URI: https://github.com/Tomoya185-miyawaki/wp-sample-plugin
Description: WordPress Plugin Sample build.
Version: 1.0.0
Author: Tomoya Miyawaki
Author URI: https://github.com/Tomoya185-miyawaki/wp-sample-plugin
License: GPLv2 or later
*/
new Sample_Plugin();

class Sample_Plugin {
	/**
	 * Constructor
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Add admin menus.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	public function admin_menu() {
		add_menu_page(
			'サンプルA', //クリックした時のタイトル
			'サンプルB', //設定画面に出る名称
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' ),
			'dashicons-admin-plugins' //メニューの左のアイコン
		);
	}
}
