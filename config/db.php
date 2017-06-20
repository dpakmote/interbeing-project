<?php 
	/**
	* Establish database connection
	*/
	class db
	{
		public $conn = null;
		public function __construct()
		{
			$DR = $_SERVER["DOCUMENT_ROOT"]."/interbeing-project/";
			include_once ($DR."config/config.php");
			if ($this->conn==null){
				$this->conn = mysqli_connect($db_host,$db_user,$db_pwd,$db_database) or die("Error: Cannot Connect to Database");
			}
			return $this->conn;
		}
		public function close_conn ()
		{
			if ($this->conn!=null){
				mysqli_close($this->conn);
			}
		}
	}
?>