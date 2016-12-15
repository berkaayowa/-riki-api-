<?php

	function makeReservation($reservation){
		global $db;

		$reservation_query = "INSERT INTO reservations 
		(customer_id,vehecle_id,reservation_pickupdate,reservation_returndate,reservation_amount_to_pay)
		VALUES ({$reservation['customer_id']},{$reservation['vehecle_id']},'{$reservation['reservation_pickupdate']}',
		'{$reservation['reservation_returndate']}',{$reservation['reservation_amount_to_pay']})";


		if($db->update($reservation_query)){

			 echo "fghjhghj";
			 $rental_status = $reservation['rental_status'];
			 $get_reservation_id = "SELECT* FROM reservations WHERE customer_id = '{$reservation['customer_id']}' AND
			vehecle_id = '{$reservation['vehecle_id']}' AND  reservation_pickupdate ='{$reservation['reservation_pickupdate']}'";

			 $run_query = $db->fetch($get_reservation_id);

			 $reservation_id = "";

			foreach ($run_query as $row) {
			$reservation_id = $row['reservation_id'];
		 	}

		 	echo $reservation_id;

			makeRental($rental_status,$reservation_id);
		}
	}

	function makeRental($rental_status,$reservation_id){
        global $db;
		$rental_query = "INSERT INTO rentals 
		(reservation_id,rental_status)
		VALUES ({$reservation_id},
		'{$rental_status}')";

		if($db->update($rental_query)){
				echo "rental crated successfully";
		}
	}

?>