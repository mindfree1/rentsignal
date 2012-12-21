<?php

namespace Fuel\Migrations;

class Create_mapgens
{
	public function up()
	{
		\DBUtil::create_table('mapgens', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'update' => array('type' => 'action'),
			'load' => array('type' => 'action'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('mapgens');
	}
}