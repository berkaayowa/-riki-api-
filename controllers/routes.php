<?php
// Routes

$app->get('/attractions/', function ($request, $response, $args) {
    $attractions = getAttractions();
	$response = $response->withJson($attractions);
	return $response;
});

$app->get('/attraction/{id}', function ($request, $response, $args) {
	$attraction = getAttraction($request->getAttribute('id'));
	$response = $response->withJson($attraction);
	return $response;
});

$app->get('/vehicles/', function ($request, $response, $args) {
	$response = $response->withJson(getVehicles());
	return $response;
});

$app->get('/vehicle/{id}', function ($request, $response, $args) {
	$vehicle = getVehicle($request->getAttribute('id'));
	$response = $response->withJson($vehicle);
	return $response;
});

$app->get('/hotels/', function ($request, $response, $args) {
	$response = $response->withJson(getHotels());
	return $response;
});

$app->get('/hotel/{id}', function ($request, $response, $args) {
	$hotel = getHotel($request->getAttribute('id'));
	$response = $response->withJson($hotel);
	return $response;
});

$app->get('/rooms/', function ($request, $response, $args) {
	$response = $response->withJson(getRooms());
	return $response;
});

$app->get('/room/{id}', function ($request, $response, $args) {
	$room = getRoom($request->getAttribute('id'));
	$response = $response->withJson($room);
	return $response;
});

$app->get('/countries/', function ($request, $response, $args) {
	$response = $response->withJson(getCountries());
	return $response;
});

//customer 

$app->post('/login/', function ($request, $response, $args) {
	$params = $request->getParams() ;

	$email = $params['email'];
	$password = $params['password'];
	$result = signIn($email,$password);
	$query = implode('#', $result[0]);
	return $query;
});

$app->post('/signup/', function ($request, $response, $args) {
	$params = $request->getParams();
	$cusomer = [
		"customer_name"=>$params['customer_name'],
		"customer_surname"=>$params['customer_surname'],
		"customer_gender"=>$params["customer_gender"],
		"customer_dob"=>$params['customer_dob']
	];

	$customer_contact = [
		"customer_email"=>$params['customer_email'],
		"customer_password"=>$params['customer_password'],
		"city_id"=>$params['city_id'],
		"customer_phone"=>$params['customer_phone']
	];

	return signUp($cusomer,$customer_contact);


});

$app->post('/makerental/', function ($request, $response, $args) {
	$params = $request->getParams();

	$reservation_id = $params['reservation_id'];
	$reservation_status = $params['reservation_status'];
	return makeRental($reservation_id,$reservation_status);
});

$app->post('/makereservation/', function ($request, $response, $args) {
	$params = $request->getParams();

	$reservation = [
		"customer_id"=>$params['customer_id'],
		"vehecle_id"=>$params['vehecle_id'],
		"reservation_pickupdate"=>$params['reservation_pickupdate'],
		"reservation_returndate"=>$params['reservation_returndate'],
		"reservation_amount_to_pay"=>$params['reservation_amount_to_pay'],
		"rental_status"=>$params['rental_status']
		
	];
    return makeReservation($reservation);
;
});

$app->post('/updateuser/', function ($request, $response, $args) {
	//$user_id = $request->getAttribute('id');

	
	$params = $request->getParams();
    $cusomer = [
        "customer_id"=>$params['customer_id'],
		"customer_name"=>$params['customer_name'],
		"customer_surname"=>$params['customer_surname'],
		"customer_gender"=>$params["customer_gender"],
		"customer_dob"=>$params['customer_dob']
	];

	$customer_contact = [
		"customer_email"=>$params['customer_email'],
		"customer_password"=>$params['customer_password'],
		"city_id"=>$params['city_id'],
		"customer_phone"=>$params['customer_phone']
	];

	return updateUser($cusomer,$customer_contact);


});


$app->post('/recoverpassword/', function ($request, $response, $args) {
	$params = $request->getParams();
	$customer_email = $params['customer_email'];

  
	return recoverPassword($customer_email);



});