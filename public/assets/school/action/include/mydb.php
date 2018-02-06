<?php
	 require_once 'settings.php';
	 class mydb {
		 private static $instance;
		 private $mysqli;
		 private $host, $user, $pass, $dbName;
		 private $Data = array();

		 public function __construct() { }
		 
		 static function getInstance() {
			 if (!self::$instance) { self::$instance = new self(); }
			 return self::$instance;
		 }
		 
		 function connect($host, $user, $pass, $dbname) {
			 $this->host = $host;$this->user = $user; $this->pass = $pass; $this->dbName = $dbname;
			 $this->mysqli= mysqli_connect($this->host,$this->user, $this->pass, $this->dbName) or die("could not connect");
		 }
		 
		 public function Query($sql, $mode="Array") {
        		$result = mysqli_query($this->mysqli,$sql,MYSQLI_STORE_RESULT);
				switch ($mode) {
					case 'Array':
				    	if ($result != null && $result->num_rows > 0) {
							$this->Data = $result->FETCH_ASSOC();
						}
					break;                            
					default:
						if ($result != null && $result->num_rows > 0)
							while ($row = $result->fetch_assoc()) {
					   			$this->Data[] = $row;                        
							}
					break;
				}
				//free the resultset
				if ($result != null) $result->free();   
				while ($this->mysqli->next_result()) {
					$result = $this->mysqli->use_result();
					if ($result instanceof mysqli_result) {
						$result->free();
					}
				}
			$this->mysqli->close();
			return $this->Data;
		}
		
		public function Multi_Query($sql) {
			$rdata = array(); 
			if ($this->mysqli->multi_query($sql)) {
				do {
					if ($result = $this->mysqli->store_result()) {
						while ($row = $result->FETCH_ASSOC()) {
							$this->Data[] = $row;  
						}
						$result->free();
						//$rdata[] = $this->Data;
						$rdata[] = isset($this->Data) ? $this->Data : array();
						unset($this->Data);
					}
				}
				while ($this->mysqli->next_result());
			}
			$this->mysqli->close();
			return $rdata;
		}
		
		public function Combine_Query($sql) {
			$rdata = array();
			if ($this->mysqli->multi_query($sql)) {
				do {
					if ($result = $this->mysqli->store_result()) {
						while ($row = $result->FETCH_ASSOC()) {
							$this->Data[] = $row;  
						}
						$result->free();
						if (isset($this->Data))
							$rdata['Rows'.count($rdata)] = $this->Data;
						else
							$rdata['Rows'.count($rdata)] = array();
						unset($this->Data);
					}
				}
				while ($this->mysqli->next_result());
			}
			$this->mysqli->close();
			return $rdata;
		}
		public function exeScalar($sql) {
			$result = $this->mysqli->query($sql);
			$this->mysqli->close();
			return '{"success":true}';
		}
	}
?>