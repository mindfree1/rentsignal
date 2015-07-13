<?php
/**
 * The development database settings.
 */

return array(
	'default' => array(
		'driver' => array('Simpleauth'),
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=rentsignals',
			'username'   => 'root',
			'password'   => 'root',
		),
	),
);
