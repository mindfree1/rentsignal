<?php

namespace Fuel\Migrations;

class Create_signals
{
	public function up()
	{
		\DBUtil::create_table('signals', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'tags' => array('constraint' => 255, 'type' => 'varchar'),
			'short_description' => array('type' => 'text'),
			'lng_description' => array('type' => 'text'),
			'location' => array('constraint' => 255, 'type' => 'varchar'),
			'lat' => array('type' => 'float'),
			'lng' => array('type' => 'float'),
			'rent' => array('type' => 'text'),
			'avail_from' => array('type' => 'date'),
			'rooms' => array('constraint' => 11, 'type' => 'int'),
			'bathrooms' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('signals');
	}
}