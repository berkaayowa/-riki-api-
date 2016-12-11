<?php
	function sendQuote($quote){
		global $db;
		
		$quote_code = uniqid($quote['attraction_id']);

		$quote_query = "INSERT INTO quotes 
		(customer_id,attraction_id,customer_msg,quote_code)
		VALUES ({$quote['customer_id']},{$quote['attraction_id']},
		'{$quote['customer_msg']}','{$quote_code}')";

		

		$get_customer_email = "SELECT * FROM customer_contacts 
		JOIN customers ON customer_contacts.customer_id 
		= customers.customer_id
		WHERE customer_contacts.customer_id = '{$quote['customer_id']}'";
		$run_query = $db->fetch($get_customer_email);

		$email = "";
		$name = "";

		 foreach ($run_query as $row) {
			$email = $row['customer_email'];
			$name = $row['customer_name'];	 	
		}

		$attraction = getUserAttraction($quote['attraction_id']);
		
		$msg = 'Hi '.$name.', we have received your quote</br></br>
		Here are you quote details:
		Attraction:  '.$attraction[0]['name'].'</br>
		Attraction Description: '.$attraction[0]['attraction_desc'].'</br>
		City Description: '.$attraction[0]['city_desc'].'</br>
		Country: '.$attraction[0]['country_name'].'</br>';

		if($db->update($quote_query)){
			$flag =  Quote_email::send('Attraction Quote *',' Riki Tour Quote','', $msg,$email);
			if($flag){
				$update_customer_query = "UPDATE quotes
				SET quote_emailed=1 where quote_code = '$quote_code'";
				$db->update($update_customer_query);
			}

			return "Quote request successfully recieved!";
		}
		else{
			return "We coulnd't recieve your quote, please try again later!";
		}
	}
	
	function getUserAttraction($attraction_id){
		global $db;
		$attraction_found = $db->fetch("
			SELECT * FROM attractions
			JOIN images ON attractions.image_id 
			= images.image_id
			JOIN cities ON attractions.city_id = cities.city_id
			JOIN  countries ON cities.country_id = countries.country_id WHERE attractions.attraction_id = ".$attraction_id."

			");
		if ($attraction_found != null) {
			return $attraction_found;
		}
		else
		{
			return null;
		}
		return $attraction_found;
	}

?>