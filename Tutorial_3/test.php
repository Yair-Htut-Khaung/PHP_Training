<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form name="Filter" method="POST">
    From:
    <input type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" />
    <br/>
    To:
    <input type="date" name="dateTo" value="<?php echo date('Y-m-d'); ?>" />
    <input type="submit" name="submit" value="Login"/>
</form>
<?php
$new_date = date('Y-m-d', strtotime($_POST['dateFrom']));
echo $new_date;

$dt=$_POST['dt'];
$dt="02/28/2007"; // Setting a date in m/d/Y format 
$arr=explode("/",$dt); // breaking string to create an array
$mm=$arr[0]; // first element of the array is month
$dd=$arr[1]; // second element is date
$yy=$arr[2]; // third element is year
If(!checkdate($mm,$dd,$yy)){
echo "invalid date";
}else {
echo "Entry date is correct";
}

?>

</body>
</html>