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
require_once( plugin_dir_path( __FILE__ ) . 'wp-sample-plugin-hero.php');
require_once( plugin_dir_path( __FILE__ ) . 'wp-sample-plugin-wizard.php');

class Human {
	public $para = array();
	public function __construct( $para ) {
		$this->para = $para;
	}
	public function cry() {
		echo $this->para['voice'];
	}
	public function attack() {
		$range = rand(0, 5);
		$sign  = rand(0, 1);
		if ($sign === 0) {
			$range = $range * -1;
		}
		$range += $this->para['power'];
		echo $this->para['name'] . 'の攻撃は！<br>';
		echo $this->para['name'] . 'は、' . $range . 'のダメージを与えた';
		return $range;
	}
	public function die_flag( $damage, $name ) {
		$this->para['hp'] -= $damage;
		if ( $this->para['hp'] <= 0 ) {
			echo $this->para['name'] . 'は、' . $name . 'に殴られた！';
			echo $this->para['name'] . 'は,死んでしまった。';
		}
	}
}
$hazama_para = array(
	'name' 	=> 'Yoshiki',
	'hp'    => 10,
	'power' => 10,
	'speed' => 500,
	'voice' => 'おぎゃああああああ'
);
$imai_para = array(
	'name' 	=> 'Miku',
	'hp'    => 100,
	'power' => 30,
	'speed' => 5,
	'voice' => 'ひゃああああああ'
);
// $hazama = new Wizard( $hazama_para );
// $imai   = new Hero( $imai_para );
//
// $hazama->magic();
// $imai->cover();
//
// $damage = $imai->attack();
// $hazama->die_flag( $damage, $imai->para['name'] );
