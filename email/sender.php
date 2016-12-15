<?php
	require_once("/mealler.php");
	require_once("/taskEmailView.php");

	class taskEmail
	{
		private $email;
		public static function send($task_id)
		{
			if(!empty($task_id)) {
				$this->email = new Email();
				$msg ;
				$title;

				$query = "SELECT user_name,email, task_id,type_name, description, title,expected_finish_date FROM tasks 
				INNER JOIN users ON tasks.assigned_to = users.user_id
				INNER JOIN task_types ON tasks.type_id = task_types.type_id
				WHERE task_id = '{$task_id}' AND emailed = '0'";

				//$result = $db->fetch($query);

				if($result != null) {
					// foreach ($result as $row ) {
					// 	$msg = get_msg(
					// 			$row['user_name'],
					// 			$row['task_id'],
					// 			$row['type_name'],
					// 			$row['title'],
					// 			$row['description'],
					// 			$row['expected_finish_date']);

					// 			$title = $row['task_id'];
					// }

					if($this->email->send_email( $title." ''New Task Assigned to you","ayowaberka@gmail.com",$msg)) {
						echo "sent";
					} else {
						echo "fail to send ";
					}
				}
			} else {
				echo "empty task id ";
			}
		}
	}
	

?>