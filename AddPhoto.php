<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('Photo.php');
	require_once('DataBase.php');
	session_start();
		$brandName = $_POST['name'];
		$FileName = $_FILES['brandImage']['name'];
		$tmp_name = $_FILES['brandImage']['tmp_name'];//logo
		
		$location = "TeamPhotos/";
		
		if(move_uploaded_file($tmp_name,$location.$brandName.".jpg")){
			$ImageURL =$location.$brandName.".jpg";
			$DB = new Database();
			$brand = new Photo(0, $brandName, $ImageURL);
			$DB->addPhoto($brand);
			header('Location: TeamDetails.php');
		
	}else{
		header('Location: TeamDetails.php');
	}
?>

