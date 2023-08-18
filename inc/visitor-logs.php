<?php 
 
// Include the database configuration file 
include_once 'connection.php';   

 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
$user_current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 


$user_device = get_device();

 function  get_device(){
   // Check if the "mobile" word exists in User-Agent 
	$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
	  
	// Check if the "tablet" word exists in User-Agent 
	$isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet")); 
	 
	// Platform check  
	$isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")); 
	$isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")); 
	$isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")); 
	$isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")); 
	$isIOS = $isIPhone || $isIPad; 
	 
	if($isMob){ 
	    if($isTab){ 
	    	return 'Using Tablet';
	        // echo 'Using Tablet Device...'; 
	    }else{ 
	    	return 'Using Mobile';
	       // echo 'Using Mobile Device...'; 
	    } 
	}else{ 
		return 'Using Desktop';
	   // echo 'Using Desktop...'; 
	} 
	 
	if($isIOS){ 
	   // echo 'iOS'; 
	    return 'iOS';
	}elseif($isAndroid){ 
	    //echo 'Mobile'; 
	    return 'Mobile';
	}elseif($isWin){ 
	    //echo 'WINDOWS'; 
	    return 'WINDOWS';
	} 

}


 
// Get server related info 
$user_ip_address = $_SERVER['REMOTE_ADDR']; 
// $user_device = $_SERVER['HTTP_USER_AGENT'];  
$user_os = $_SERVER['HTTP_USER_AGENT']; 
$page_url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";   

      $selectcollumn = "select * from visitor_logs where `user_ip_address` = '$user_ip_address'";
      // $sql = "select sum(column) from table";
      $sumquery = mysqli_query($conn, $selectcollumn);
      $sumquery  = $sumquery->fetch_row();
      $total_savings = $sumquery[0];


if($total_savings){
 $visit_count = $sumquery[6];

$visit_count = $visit_count+1;

$sql= "update visitor_logs set visit_count=$visit_count where `user_ip_address` = '$user_ip_address'";

$visit_count = mysqli_query($conn, $sql);


} else {
	// Insert visitor activity log into database 
$sql =	"INSERT INTO visitor_logs (page_url, user_device, user_ip_address, user_os, visit_count) VALUES ('$page_url', '$user_device','$user_ip_address','$user_os','1' )";
$insert = $conn->query($sql);
}


?>