<?php

require_once ( 'views/default.php' );

class BlackCodeSetup {

	private $state, $view;

	public function __construct() {
		if ( file_exists( '../core/config/bc_config.php' ) ) { die( 'FATAL ERROR: bc_config.php alredy present' ); }
		$this->view = new DefaultView();
		call_user_func( array( $this, $this->getState() ) );
	}

	/**
	* Simply display welcome message and bdd form
	*/
	private function init() {

	}

	/**
	* Get current setup state
	*/
	private function getState() {
		if ( isset( $_GET['state'] ) ) {
			switch ( $_GET['state'] ) {
				case 'init':
					return 'init';
					break;
				case 'checkSettings':
					return 'checkSettings';
					break;
				case 'install':
					return 'install';
					break;
				default:
					return 'init';
					break;
			}
		} else {
			return 'init';
		}
	}
}