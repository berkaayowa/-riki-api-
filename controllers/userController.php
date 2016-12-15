<?php
function signIn($email, $password) {
	global $db;
	$customer_found = $db->fetch("
		SELECT 
		customers.customer_id, 
		customers.customer_name, 
		customers.customer_surname, 
		customers.customer_gender, 
		customers.customer_dob, 
		customer_contacts.customer_email, 
		customer_contacts.customer_phone,
		cities.city_name, 
		countries.country_name
		FROM customers
		JOIN customer_contacts 
		ON customers.customer_id = customer_contacts.customer_id
		LEFT JOIN cities 
		ON customer_contacts.city_id = cities.city_id
		LEFT JOIN countries 
		ON cities.country_id = countries.country_id
		WHERE customer_email ='{$email}' 
		AND customer_password = '{$password}' 
		");

	if ($customer_found != null) {
		return $customer_found;// = array($customer_found);
	}
	else
	{
		$customer_found = ['customer'=>'not_found'];
	}
	return $customer_found;
}


function signUp($customer, $contacts) {
	global $db;

	$check_costomer_existance = "SELECT * FROM customers WHERE 
	customer_name = '{$customer['customer_name']}'
	AND customer_surname = '{$customer['customer_surname']}'";

	if($db->fetch($check_costomer_existance) != null){
		return "This user is already registered";
	}
	else{

		$customer_query = "INSERT INTO customers 
		(customer_name,customer_surname,customer_gender,customer_dob)
		VALUES ('{$customer['customer_name']}','{$customer['customer_surname']}',
		'{$customer['customer_gender']}',
		'{$customer['customer_dob']}')";

		$get_id_query = "SELECT customer_id FROM customers WHERE 
		customer_name = '{$customer['customer_name']}'
		AND customer_surname = '{$customer['customer_surname']}'";

		if($db->update($customer_query)){
			$get_id_from_db =  $db->fetch($get_id_query);
			$id;
			if($get_id_from_db != null) {
				foreach ($get_id_from_db as $id => $value) {
					$id = $value['customer_id'];
					break;
				}

				$customer_contact_query = "INSERT INTO customer_contacts
				(customer_id,customer_email,customer_password,city_id,customer_phone)
				VALUES ({$id},'{$contacts['customer_email']}','{$contacts['customer_password']}',
				{$contacts['city_id']},{$contacts['customer_phone']})";

				if($db->update($customer_contact_query)){
					return "successfully registered!";
				}
			}
		}
	}

	return "Oops!looks like something went wrong";
}

function updateUser($customer, $contacts){
	global $db;
     


	$check_costomer_existance = "SELECT * FROM customers WHERE 
	customer_id = {$customer['customer_id']}";
	//print($check_costomer_existance);
  
    //die($db->fetch($check_costomer_existance));
	if($db->fetch($check_costomer_existance) == null){
		return "This is customer is not registered!";
	}
	else{
		$update_customer_query = "UPDATE customers
		SET customer_name='{$customer['customer_name']}',customer_surname='{$customer['customer_surname']}',
		customer_gender='{$customer['customer_gender']}',customer_dob='{$customer['customer_dob']}'
		WHERE customer_id={$customer['customer_id']}";
		

		if($db->update($update_customer_query)){
			
			$update_customer_contacts_query = "UPDATE customer_contacts
			SET customer_email = '{$contacts['customer_email']}',customer_password='{$contacts['customer_password']}',
			city_id={$contacts['city_id']},customer_phone='{$contacts['customer_phone']}'
			WHERE customer_id={$customer['customer_id']}";
			 echo $update_customer_contacts_query;

			if($db->update($update_customer_contacts_query)){
					return "user details updated successfully registered!";
			}
		}
	}
}

function recoverPassword($customer_email){
	global $db;
	$check_costomer_existance = "SELECT * FROM customer_contacts WHERE 
	customer_email = '{$customer_email}'";
    $run_query = $db->fetch($check_costomer_existance);
	
	if($run_query == null){
		return "This is customer is not registered!";
	}
	else{
		foreach ($run_query as $row) {
		 	return $row['customer_email'];
		 }
	}
}

?>