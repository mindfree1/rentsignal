<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2011 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(
	'link_multiple_providers' => true,
	'auto_registration' => true,
	'driver' => array('simpleauth'),
	'verify_multiple_logins' => false,
	'salt' => 'owefpinlnqwddsf@3534afgdslfkmsd#$fnlpDFGsdf90867asdfhlnasm',

	'Strategy' => array(
	    'Facebook' => array(
	       'app_id' => '229355797263616',
	       'app_secret' => '0760ae743a1c7538acf7171f83cb44ad'
	     ),
	     'Twitter' => array(
	    	'key' => 'xK1DhxH5dsXZUjix6zqjBlC3q',
	    	'secret' => 'xaUstqSzqo4PpBjmrsFWff9Pf5m3SL2GFsJzItt8nt5a3eUfVc'
	     ),
	     'Google' => array(
	    	'client_id' => '487217537177-8pim776j8ctdp01btpnkachlolipbbdn.apps.googleusercontent.com',
	    	'client_secret' => 'VPvQqrdcxA3_KLWrO37v2j9e'
	     ),
	 ),
);