<?php
	function get_msg($name,$tak_id,$type,$title,$desc,$due) {
		$msg ='
		<strong style ="FONT-SIZE: 19px;COLOR: #525252;">Hi '.$name.', You have been assigned a new task</strong>
		<table style ="FONT-SIZE: 16px;MARGIN-BOTTOM: 1em;FONT-FAMILY: Arial, 
		Helvetica, sans-serif;MARGIN-TOP: 0px;COLOR: #a7a7a7;LINE-HEIGHT: 130%;
		BACKGROUND-COLOR: transparent;width:350px;">
			<br>
			<tr>
				<td >Task Id</td><td>'.$tak_id.'</td>
			</tr>
			<tr>
				<td >Type </td><td>'.$type.'</td>
			</tr>
                         <tr>
				<td > Title </td><td>'.$title.'</td>
			</tr>
			<tr>
				<td >Description </td><td>'.$desc.'</td>
			</tr>
			<tr>
				<td >Due date </td><td>'.$due.'</td>
			</tr>
			<tr>
				<td></td>
			</tr>
		</table>
		<h4 style ="FONT-SIZE: 15px;">Please click <a href ="http://tp2.whcb.co.za/"> here </a>to accept this task  </h4>';

		return $msg;
	}


?>