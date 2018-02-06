<?php
	require_once 'mydb.php';
	//$jsonstring = new jsonstring();
	class jsonstring {
		public function __construct() {  }
		private function db() { $dbo = mydb::getInstance(); $dbo->connect("localhost","root","latam123","floretz_new"); return $dbo; }
		#private function db() { $dbo = mydb::getInstance(); $dbo->connect("68.178.217.47","floretz","Qwerty@123","floretz"); return $dbo; }
		
		public static function success() {
			$a = func_get_args();
			$arr = array();
			if (count($a) > 0) $arr['success'] = $a[0];			 
			else $arr['success'] = "0";
			return json_encode($arr);
		}
		 
		public static function failure() {
			$a = func_get_args();
			$arr = array();
			if (count($a) > 0) $arr['failure'] = $a[0];			 
			else $arr['failure'] = "1";
			return json_encode($arr);
		}
		
		public static function error($message) {
			$arr = array();
			$arr['failure'] = "DATABASE ERROR:"+$message;
			return json_encode($arr);
		}
		 
		public function getMessage($query) {
			$res = $this->db()->Query($query);
			$val = $res['message'];
			if ($val == '0') return JsonString::success();
			else if ($val == '1') return JsonString::failure();
			else if ($val == '-1') {
				unset($res['message']);
				$arr = array("success"=>"true"); 
				$arr["key"] = $res["nextmessage"];
				unset($res["nextmessage"]);
				foreach($res as $key => $value) {
					$arr[$key]= $value;
				}
				return json_encode($arr);
				//return JsonString::success($res['nextmessage']);
			}
		}
		
		public function exeScalar($query) {
			$res = $this->db()->exeScalar($query);
			return $res;
		}
		
		public function singleResult($query) {
			$res = $this->db()->Multi_Query($query);
			if (count($res) > 0) {
				if (count($res) == 1) return "{\"success\":true,\"Rows\":".json_encode($res[0])."}";
				else {
					return "{\"success\":true,\"total\":".$res[0][0]["cnt"].",\"Rows\":".json_encode($res[1])."}";
				}
			} else echo "{\"success\":true,\"Rows\":[]}";
		}
		
		public function multiResult($query,$mode="json") {
			if ($mode === 'json') return json_encode($this->db()->Combine_Query($query));
			else return $this->db()->Combine_Query($query);
		}
		
		public function getResultSet($sql,$mode="Array") {
			return $this->db()->Query($sql,$mode);
		}
		
		public function makeXML($arr=NULL) {
			$method = $_SERVER['REQUEST_METHOD'];
			switch($method) {
				case 'GET':
					return $this->getXML($arr);
				break;
				case 'POST':
					return $this->postXML($arr);
				break;
				default:
					return $this->getXML($arr);
			}
		}
		public function getParamVal($param) {
			$method = $_SERVER['REQUEST_METHOD'];
			switch($method) {
				case 'GET':
					return $_GET[$param];
				break;
				case 'POST':
					return $_POST[$param];
				break;
				default:
					return $_GET[$param];
			}
		}
		public function getXML($arr=NULL) {
			$check = array('c'=>TRUE,'m'=>TRUE,'option'=>TRUE,'group'=>TRUE,'sort'=>TRUE);
			$xml = '<row';
			foreach($_GET as $name=>$value) {
				if (isset($check[$name])) continue;
			$xml .= ' '.$name.'="'.$value.'"';}
			if (is_null($arr) === FALSE) {
				foreach($arr as $key => $value)
					$xml .= ' '.$key.'="'.$value.'"';
			}
			$xml .= '/>';
			unset($check); $check = NULL;
			return $xml;
		}
		
		public function postXML($arr=NULL) {
			$check = array('c'=>TRUE,'m'=>TRUE,'option'=>TRUE,'group'=>TRUE,'sort'=>TRUE);
			$xml = '<row';
			foreach($_POST as $name=>$value) {
				if (isset($check[$name])) continue;
			$xml .= ' '.$name.'="'.$value.'"';}
			if (is_null($arr) === FALSE)
				foreach($arr as $key => $value)
					$xml .= ' '.$key.'="'.$value.'"';
			$xml .= '/>';
			unset($check); $check = NULL;
			return $xml;
		}
		
		public function jsonToXML($arr, $subarray=FALSE) {
			$xml = '';		
			if ($subarray === FALSE) {
				$xml = '<row';
				foreach($arr as $key => $value) {
					$xml .= ' '.$key.'="'.$value.'"';
				} $xml .= '/>';
			} else {
				foreach($arr as $key => $value) {
					$narr = (array)$value;
					$xml .= '<row';
					foreach ($narr as $nkey => $nvalue) {
						$xml .= ' '.$nkey.'="'.$nvalue.'"';
					}
					$xml .= '/>'."\n";
					unset($narr); unset($nkey);
				}
				unset($arr); unset($key);
			}
			return $xml;
		}
		public function isIE() {
			$u_agent = $_SERVER['HTTP_USER_AGENT']; 
			$ub = 0; 
			if(preg_match('/MSIE/i',$u_agent)) { $ub = 1; } 
			return $ub;
		}
		
		/*public function execute() {
			echo json_encode($this->db()->Combine_Query("SELECT * FROM users;select 1 as cnt;"));
			//echo $this->dbo->exeScalar("UPDATE users SET user_type='1' WHERE user_id='1'");
		}*/
	}
?>
