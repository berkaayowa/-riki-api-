<?php
class mysql_database {

	private $dbConnection = null;

	public function __construct($hostName, $userName, $password, $databaseName) {

		$this->dbConnection = new mysqli($hostName, $userName, $password, $databaseName);
		if ($this->dbConnection->connect_error) {
			die("Connection failed: " . $this->$dbConnection->connect_error);
		}

		mysqli_set_charset($this->dbConnection,"utf8");
	}

/**
 * fetches all data from database
 * @access public
 * @param  [$query] query to be executed
 * @return [array] array of customers
 * @author Berka
 */
	public function fetch($query) {
		$data = array();
		$result = $this->dbConnection->query($query);
		if ($result->num_rows > 0) {
			while($row= $result->fetch_assoc()) {
					$data[] = $row;
			}
		}
		return $data;
	}

/**
 * updates , adds data to the database
 * return true if successfully executed
 * else false
 * @access public
 * @param [$query] query to be executed
 * @return [boolean] true or false
 * @author Berka
 */
	public function update($query) {
		if (!$this->dbConnection->query($query)) {
			return false;
		}
		return true;
	}

/**
 * gets a query and returns number of rows
 * @access public
 * @param [$query] query to be executed
 * @return [integer]
 * @author Berka
 */
	public function count($query) {
		$result = $this->dbConnection->query($query);
		return $result->num_rows;
	}

	public function get_db_object() {
		return $this->dbConnection;
	}

}

	$ftp = array(
		'username' => 'tm@tp2.whcb.co.za',
		'password' =>'0717253112',
		'dirctory' => 'public_html/tp2.whcb.co.za/'
		);
	//tp2.whcb.co.za
	//server ip v 149.202.195.2
	 $liveDatabase = array(
		'server' =>'cpanel.whcb.co.za',
		'username' => 'pixpijma_berka',
		'password' =>'Brk1991@',
		'dbname' =>'pixpijma_android'
	);

	$localDatabase = array(
		'server' =>'127.0.0.2',
		'username' => 'root',
		'password' =>'',
		'dbname' =>'riki-tours'
	);

	$db = new mysql_database(
			$liveDatabase['server'],
			$liveDatabase['username'],
			$liveDatabase['password'],
			$liveDatabase['dbname']);

