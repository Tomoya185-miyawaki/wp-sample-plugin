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
		add_submenu_page(
			__FILE__,
			'サンプル一覧',
			'サンプル一覧',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' ),
			'dashicons-admin-plugins'
		);
		add_submenu_page(
			__FILE__,
			'サンプル登録',
			'サンプル登録',
			'manage_options',
			plugin_dir_path( __FILE__ ) . 'includes/wp-sample-plugin-post.php',
			array( $this, 'post_page_render' ),
			'dashicons-admin-plugins'
		);
	}

	/**
	 * Rendaring List Page.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	public function list_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-sample-plugin-list.php' );
		new Sample_Plugin_List();
	}

	/**
	 * Rendaring List Page.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	public function post_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-sample-plugin-post.php' );
		new Sample_Plugin_Post();
	}
}
