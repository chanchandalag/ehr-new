<?php
//medical-send

include "../db_conn.php";

$sid = $_GET['id'];

$save_query = "INSERT INTO `medical` (`mid`, `sid`) VALUES (NULL, $sid)";

$process = mysqli_query($conn,$save_query);

if($process){
	header("location: /?page=medical-records&status=success");
}else{
	echo 'DB error, fck!';
}

