<?php
require_once 'include/jsonstring.php';
class admindbcall {
	public function __construct() {
		$this->jsonstring = new jsonstring();
	}
	public function logincheck() {
		$sql = "CALL spLogin_Users('userlogin','".$this->jsonstring->makeXML()."')";
		$res = $this->jsonstring->getResultSet($sql,'row');
		$val = array_values($res[0]);	
		if ($val[0] == 0) echo jsonstring::failure();
		else {
			///$this->load->helper('date');
			//$this->session->set_userdata('user',array($val[0]));
			echo jsonstring::success($val[0]);
		}
	}
	public function logout() {
		include '../admin/index.php';
	}
	public function href() {
		include '../admin/'.$_REQUEST['to'].".php";
	}
	public function usermanagement() {
		$option = $this->jsonstring->getParamVal('option');
		$sql = "CALL spUser_Management('".$option."','".$this->jsonstring->makeXML()."')";
		switch($option) {
			case "branch": echo $this->jsonstring->singleResult($sql); break;
			case "allusers": echo $this->jsonstring->singleResult($sql); break;
			case "search": echo $this->jsonstring->singleResult($sql); break;
			case "insertuser": echo $this->jsonstring->getMessage($sql); break;
			case "updateuser": echo $this->jsonstring->getMessage($sql); break;
			case "deleteuser": echo $this->jsonstring->getMessage($sql); break;
		}
	}
	public function branchcall() {
		$option = $this->jsonstring->getParamVal('option');
		$sql = "CALL spMaster_Branch('".$option."','".$this->jsonstring->makeXML()."')";
		//header('Content-type: application/json');
		switch($option) {
			case "branchall": echo $this->jsonstring->singleResult($sql); break;
			default: echo $this->jsonstring->getMessage($sql);
		}
	} 
	
	public function fileUpload() {
		if (empty($_FILES)) {
			$option = $this->jsonstring->getParamVal('option');
			$sql = "CALL spUpload_Files('".$option."','".$this->jsonstring->makeXML()."')";
			switch($option) {
				case "select": echo $this->jsonstring->multiResult($sql); break;
				default: 
					unlink(str_replace('action','upload',getcwd()).DIRECTORY_SEPARATOR.$this->jsonstring->getParamVal('folder').DIRECTORY_SEPARATOR.$this->jsonstring->getParamVal('filename'));
					echo $this->jsonstring->getMessage($sql);
				break;
			}
		} else if ($_FILES['pdfaudio']['name']) {
			$new_filename = strtolower($_FILES['pdfaudio']['tmp_name']);
			move_uploaded_file($_FILES['pdfaudio']['tmp_name'], str_replace('action','upload',getcwd()).DIRECTORY_SEPARATOR.$this->jsonstring->getParamVal('folder').DIRECTORY_SEPARATOR.$_FILES['pdfaudio']['name']);
			$sql = "CALL spUpload_Files('addfile','".$this->jsonstring->makeXML(array('filename'=>$_FILES['pdfaudio']['name'],'filetype'=>($_POST['folder'] == 'Audio' ? '1' : '2')))."')";
			echo $this->jsonstring->getMessage($sql);
		} else echo jsonstring::success(false);
	}
}
$func = $_REQUEST["m"];
if ($func == "") exit;
$admin = new admindbcall();
$admin->$func();

