<?php
class Model_Signal extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'tags',
		'short_description',
		'lng_description',
		'location',
		'lat',
		'lng',
		'rent',
		'avail_from',
		'rooms',
		'bathrooms',
		'user_id',
		'created_at',
		'updated_at',
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
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('tags', 'Tags', 'required|max_length[255]');
		$val->add_field('short_description', 'Short Description', 'required');
		$val->add_field('lng_description', 'Lng Description', 'required');
		$val->add_field('location', 'Location', 'required|max_length[255]');
		$val->add_field('lat', 'Lat', 'required');
		$val->add_field('lng', 'Lng', 'required');
		$val->add_field('rent', 'Rent', 'required');
		$val->add_field('avail_from', 'Avail From', 'required');
		$val->add_field('rooms', 'Rooms', 'required|valid_string[numeric]');
		$val->add_field('bathrooms', 'Bathrooms', 'required|valid_string[numeric]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

		return $val;
	}

}
