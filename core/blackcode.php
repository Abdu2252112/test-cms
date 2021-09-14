<?php

// Global includes
include ( 'common/constants/bc_constants.php' ); //defines

class BlackCode {

/**
* --------------------
* - CLASS PROPERTIES -
* --------------------
**/

	public $config = array();		// Configuration in database
	public $get_params = array();	// Get param
	public $post_params = array();	// Post param

	public $database;				// BlackCode database

	private $mode;					// Mode (admin or site)

	/**
	* Constructor
	*/
	function __construct() {

	}


/**
* -------------------
* - PRIVATE METHODS -
* -------------------
*/

	/**
	* Check if bc_config exists and redirect to setup if necessary
	* @return int constant
	*/
	private function check_config() {
		if ( ! file_exists( dirname( __FILE__ ) . '/config/bc_config.php' ) ) {
			return BC_CONFIG_NOT_EXIST;
		} elseif ( file_exists( dirname( __FILE__ ) . '/../setup' )
			&& ! file_exists( dirname( __FILE__ ) . '/../.dev' ) ) {
			return SETUP_NOT_DELETED;
		}
		return BC_CONFIG_OK;
	}


/**
* ------------------
* - PUBLIC METHODS -
* ------------------
*/

	/**
	* Show Front-Office
	*/
	public function show() {
		$this->mode = 'site';

		$ret_check = $this->check_config();
		if ( $ret_check == BC_CONFIG_NOT_EXIST ) { header( 'Location:setup' ); exit(); }
		if ( $ret_check == SETUP_NOT_DELETED ) { die( 'Please delete the setup directory!' ); }

	}

	/**
	* Show Admin - Back-Office
	*/
	public function show_admin() {
		$this->mode = 'admin';

		$ret_check = $this->check_config();
		if ( $ret_check == BC_CONFIG_NOT_EXIST ) { header( 'Location:setup' ); exit(); }
		if ( $ret_check == SETUP_NOT_DELETED ) { die( 'Please delete the setup directory!' ); }
		
	}

}