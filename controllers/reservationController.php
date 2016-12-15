<?php
		function makeReservation($reservation){
        global $db;
		$customer_query = "INSERT INTO reservations 
		(customer_id,vehecle_id,reservation_pickupdate,reservation_returndate,reservation_amout_to_pay)
		VALUES ('{$reservation['$customer_id']}','{[$vehecle_id]}','{reservation['$reservation_pickupdate']}',
		'{$reservation['$reservation_returndate']}','{$reservation['$reservation_amout_to_pay']}')";

		if($db->update($customer_query)){
				echo "reservation created crated successfully";
		}
	}
?>