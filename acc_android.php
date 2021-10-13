<?php
error_reporting(0);
?>
<?php

$hostname="localhost";
$username="id1704752_colllz";
$password="";
$dbname="id1704752_readings";



$usertable="Reading"; 

//Connect to the database

//Connect to the database
$conn = new mysqli($hostname, $username, $password,$dbname);
 

$truncate = mysql_entities_fix_string($conn, $_POST['truncate']);
$sec = mysql_entities_fix_string($conn, $_POST['sec']);
$x = mysql_entities_fix_string($conn, $_POST['x']);
$y = mysql_entities_fix_string($conn, $_POST['y']);
$z = mysql_entities_fix_string($conn, $_POST['z']);
$datetime = mysql_entities_fix_string($conn, $_POST['datetime']);
$lat = mysql_entities_fix_string($conn, $_POST['lat']);
$lon = mysql_entities_fix_string($conn, $_POST['lon']);

$macid= $_POST["macid"]; 
$alt= $_POST["altitude"]; 
 
if($macid == "")
{
	if($truncate == "1")
	{
	$sql_query = "truncate table Reading";   
	$results = $conn->query( $sql_query );
	}
	else
	{
	$sql_query = "insert into Reading(sec,x,y,z,datetime,lat,lon,altitude) values('$sec','$x','$y','$z','$datetime','$lat','$lon','$alt')";   
	$results = $conn->query($sql_query);
	}
}
else
{
if($truncate == '1')
	{
	$sql_query = "DROP TABLE IF EXISTS ".$macid;   
	$results = $conn->query( $sql_query );
	}
	else
	{	
	$sql_query="CREATE TABLE IF NOT EXISTS ".$macid."(sec text, datetime text, x text, y text, z text, lat text, lon text,altitude text)";
	$results = $conn->query( $sql_query );
	
	$sql_query = "insert into " .$macid. "(sec,x,y,z,datetime,lat,lon,altitude) values('$sec','$x','$y','$z','$datetime','$lat','$lon','$alt')";   
	$results = $conn->query( $sql_query );
	}
}

function mysql_entities_fix_string($conn, $string){
return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string){
if(get_magic_quotes_gpc()){
$string = stripslashes($string);
}
return $conn->real_escape_string($string);
}

?>
