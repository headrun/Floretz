<?php
	require_once 'include/jsonstring.php';
	class adminfloretz {
		public function __construct() {
			$this->jsonstring = new jsonstring();
		}
		
		public function birthdayUpload() {
			$shortmonth = $_POST["shortmonth"];
			$folder = str_replace('action','upload',getcwd()).DIRECTORY_SEPARATOR.$shortmonth;
			$shortdatestring = $_POST["shortdatestring"];
			$count_files = 0;
			$xml = '';
			if (!empty($_FILES)) {
				foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ) {
					$file_name = $key.$_FILES['files']['name'][$key];
				    $file_size =$_FILES['files']['size'][$key];
					if ($file_size <= 0) continue;
				    $file_tmp =$_FILES['files']['tmp_name'][$key];
				    //$file_type=$_FILES['files']['type'][$key];
					$info = new SplFileInfo($file_name);
					$name = round(microtime(true) * 1000).".".$info->getExtension();
					
					$xml .= '<row birthdayshort="'.$shortdatestring.'" birthdaymonth="'.$shortmonth.'" imagepath="'.$shortmonth."/".$name.'"/>';
					move_uploaded_file($file_tmp, $folder.DIRECTORY_SEPARATOR.$name);
					$count_files++;
				}
			}
			if ($count_files > 0) {
				$xml .= '<cnt val="'.$count_files.'"/>';
				$sql = "CALL uploadprocedure('birthdayupload','".$xml."')";
				echo $this->jsonstring->getMessage($sql);
			}
		}
		
		public function bannerUpload() {
			$orderindex = $_POST["orderindex"];
			$folder = str_replace('action','upload',getcwd()).DIRECTORY_SEPARATOR."/banners";
			if (!empty($_FILES)) {
				$file_size = $_FILES['files']['size'];
				if ($file_size <= 0) return;
				$file_name = $_FILES['files']['name'];
				$file_tmp = $_FILES['files']['tmp_name'];
				$info = new SplFileInfo($file_name);
				$name = round(microtime(true) * 1000).".".$info->getExtension();
				$xml = '<row imagepath="banners/'.$name.'" orderindex="'.$orderindex.'"/>';
				move_uploaded_file($file_tmp, $folder.DIRECTORY_SEPARATOR.$name);
				echo $this->jsonstring->getMessage("CALL bannerprocedure('addnew','".$xml."')");
			}
		}
		
		public function getCommonCall() {
			$option = $this->jsonstring->getParamVal('option');
			$sql = "CALL uploadprocedure('".$option."','".$this->jsonstring->makeXML()."')";
			switch($option) {
				case 'birthdaysearch': echo $this->jsonstring->singleResult($sql); break;
				case 'bithdayimages': echo $this->jsonstring->singleResult($sql); break;
			}
		}
		
		public function commonDbCall() {
			$restype = $this->jsonstring->getParamVal('resulttype');
			$query = $this->jsonstring->getParamVal('query');
			switch ($restype) {
				case 'single': echo $this->jsonstring->singleResult($query); break;
			}
		}
		
		public function deleteFile() {
			$option = $this->jsonstring->getParamVal('option');
			switch ($option) {
				case 'removebirthday': unlink(str_replace('action','upload',getcwd()).DIRECTORY_SEPARATOR.$_GET["dir"].DIRECTORY_SEPARATOR.$_GET["filename"]); echo $this->jsonstring->singleResult("CALL uploadprocedure('".$option."','".$this->jsonstring->makeXML()."')"); break;
				case 'removebanner': 
					unlink(str_replace('action','upload',getcwd()).DIRECTORY_SEPARATOR."banners".DIRECTORY_SEPARATOR.$_POST["filename"]); 
					echo $this->jsonstring->singleResult($_POST["query"]); 
					break;
			}
			//echo str_replace('action','upload',getcwd()).DIRECTORY_SEPARATOR.$_GET["dir"].DIRECTORY_SEPARATOR.$_GET["filename"];
		}
	}
	$func = $_REQUEST["m"];
	if ($func == "") exit;
	$admin = new adminfloretz();
	$admin->$func();
?>