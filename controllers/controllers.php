<?php

/**
 * fetches all data from database
 * @access public
 * @return [array] array of data
 * @author Berka
 */


function getAttractions() {
	global $db;
	$attractions_found = $db->fetch("
		SELECT * FROM attractions
		JOIN images ON attractions.image_id 
		= images.image_id
		JOIN cities ON attractions.city_id = cities.city_id
		JOIN  countries ON cities.country_id = countries.country_id

		ORDER BY attraction_id DESC");
	if ($attractions_found != null) {
		$attractions_found = array($attractions_found);
	}
	else
	{
		$attractions_found = array('attractions'=>'not_found');
	}
	return $attractions_found;
}

function getAttraction($attraction_id) {
	global $db;
	$attraction_found = $db->fetch("
		SELECT * FROM attractions
		JOIN images ON attractions.image_id 
		= images.image_id
		JOIN cities ON attractions.city_id = cities.city_id
		JOIN  countries ON cities.country_id = countries.country_id WHERE attractions.attraction_id = ".$attraction_id."

		");
	if ($attraction_found != null) {
		$attraction_found = array('attraction'=>$attraction_found);
	}
	else
	{
		$attraction_found = array('attraction'=>'not_found');
	}
	return $attraction_found;
}

function getVehicle($vehicle_id) {
	global $db;
	$vehicle_found = $db->fetch("
		SELECT * FROM vehicles
		LEFT JOIN images ON vehicles.image_id 
		= images.image_id WHERE vehicles.vehicle_id = ".$vehicle_id."
		");

	if ($vehicle_found != null) {
		$vehicle_found = array('vehicle'=>$vehicle_found);
	}
	else
	{
		$vehicle_found = array('vehicle'=>'not_found');
	}
	return $vehicle_found;
}

function getVehicles() {
	global $db;
	$vehicles_found = $db->fetch("
		SELECT * FROM vehicles
		LEFT JOIN images ON vehicles.image_id 
		= images.image_id
		");

	if ($vehicles_found != null) {
		$vehicles_found = array('vehicles'=>$vehicles_found);
	}
	else
	{
		$vehicles_found = array('vehicles'=>'not_found');
	}
	return $vehicles_found;
}

function getHotels() {
	global $db;
	$hotels_found = $db->fetch("
		SELECT * FROM hotels
		LEFT JOIN images ON hotels.hotel_image_id 
		= images.image_id
		");

	if ($hotels_found != null) {
		$hotels_found = array('hotels'=>$hotels_found);
	}
	else
	{
		$hotels_found = array('hotels'=>'not_found');
	}
	return $hotels_found;
}

function getHotel($hotel_id) {
	global $db;
	$hotel_found = $db->fetch("
		SELECT * FROM hotels
		LEFT JOIN images ON hotels.hotel_image_id 
		= images.image_id
		WHERE hotels.hotel_id = ".$hotel_id."
		");

	if ($hotel_found != null) {
		$hotel_found = array('hotel'=>$hotel_found);
	}
	else
	{
		$hotel_found = array('hotel'=>'not_found');
	}
	return $hotel_found;
}

function getRooms() {
	global $db;
	$rooms_found = $db->fetch("
		SELECT * FROM rooms
		JOIN hotels ON rooms.hotel_id = hotels.hotel_id
		LEFT JOIN images ON hotels.hotel_image_id = images.image_id
		JOIN cities ON hotels.hotel_city_id = cities.city_id
		JOIN  countries ON cities.country_id = countries.country_id
		");

	if ($rooms_found != null) {
		$rooms_found = array($rooms_found);
	}
	else
	{
		$rooms_found = array('rooms'=>'not_found');
	}
	return $rooms_found;
}

function getRoom($room_id) {
	global $db;
	$room_found = $db->fetch("
		SELECT * FROM rooms
		JOIN hotels ON rooms.hotel_id = hotels.hotel_id
		LEFT JOIN images ON hotels.hotel_image_id = images.image_id
		JOIN cities ON hotels.hotel_city_id = cities.city_id
		JOIN  countries ON cities.country_id = countries.country_id
		WHERE rooms.room_id  = ".$room_id."
		");

	if ($room_found != null) {
		$room_found = array('room'=>$room_found);
	}
	else
	{
		$room_found = array('room'=>'not_found');
	}
	return $room_found;
}

function getCountries() {
	global $db;
	$countries_found = $db->fetch("SELECT * FROM countries");

	if ($countries_found != null) {
		$countries_found = array('countries'=>$countries_found);
	}
	else
	{
		$countries_found = array('countries'=>'not_found');
	}
	return $countries_found;
}

