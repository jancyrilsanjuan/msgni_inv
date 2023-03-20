<?php

session_start();

include("config.php");

if(!isset($_SESSION['SESSION_EMAIL'])){

  echo "NO SESS";

}else{

	echo "YES SESS";	

}


?>