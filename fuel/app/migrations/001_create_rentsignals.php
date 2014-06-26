<?php

namespace Fuel\Migrations;

class Create_rentsignals
{
	public function up()
	{
		\DBUtil::create_table('rentsignals', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'lat' => array('type' => 'double'),
			'long' => array('type' => 'double'),
			'rent' => array('constraint' => 255, 'type' => 'varchar'),
			'avail_from' => array('type' => 'date'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('rentsignals');
	}
}