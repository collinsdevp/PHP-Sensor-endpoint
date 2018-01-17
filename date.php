<!doctype html>
<html lang="en">
<style type="text/css">
#content{
background-color:grey;
color:white;
}
#note{
color:orange;
}
#submit{
background-color:blue;
color:white;
}
</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calender widget</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

  $( function() {
    $( "#datepicker1" ).datepicker();
  } );

  $( function() {
    $( "#datepicker2" ).datepicker();
  } );

  </script>
</head>
<body>
<form method=post> 
<div id=content>
<p id="note">* click the textbox to display the calendar </p>
<p>Start Date: <input type="text" id="datepicker1" name="date1"></p>
<br/>
<p>End Date: <input type="text" id="datepicker2" name="date2"></p>
<input type=submit name=submit id="submit">
</div>
</form>
 
<?php 
if(isset($_POST['submit'])){
$d1 = $_POST['date1'];
$d2 = $_POST['date2'];


//$d1_replace = str_replace("/","-",$d1);

//$d2_replace = str_replace("/","-",$d2);

$new_d1 = date("Y-m-d",strtotime($d1));

$new_d2 = date("Y-m-d",strtotime($d2));

$date1=date_create($new_d1);
$date2=date_create($new_d2);
$diff=date_diff($date1,$date2);
echo $diff->format("%a days");

}
?>
</body>
</html>