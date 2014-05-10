<?php
use Orm\Model;

class Model_Rentsignals extends Model
{
	protected static $_properties = array(
		'id',
		'location',
		'description',
		//'lat',
		//'lng',
		'rent',
		'avail_from',
		'created_at',
		'updated_at',
		'rooms',
		'bathrooms',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('location', 'location', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required|max_length[255]');
		//$val->add_field('lat', 'Lat', 'required');
		//$val->add_field('lng', 'Long', 'required');
		$val->add_field('rent', 'Rent', 'required|max_length[255]');
		$val->add_field('avail_from', 'Avail From', 'required');
		$val->add_field('rooms', 'Rooms', 'required');
		$val->add_field('bathrooms', 'Bathrooms', 'required');

		return $val;
	}

}
