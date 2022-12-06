<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php

//datatypes and echo output testing
$name = "Yair Htut Khaung";
echo "Hellow World $name first PHP script! <br>";

$batch = 6;
echo "This is Batch $batch training <br>";

echo "me" . $name . ",is a member of Batch " . $batch ."<br>";

echo "<hr>";
//if else conditions testing
if (($name == "Yair Htut Khaung") && ($batch == 6))
{
  echo "Have a nice day! <br>";
} else
{
  echo "Who are you?";
}

echo "<hr>";
//switch case testing
switch ($name)
{
  case "Yair Htut Khaung":
    echo "Hi $name";
    break; //break testing
  case "Kaung Thant Sin":
    echo "Hi $name";
    break;
}

echo "<hr>";
//while array testing
$trainingDay = 0;

while ($trainingDay <= 10)
{
  echo "Day: $trainingDay Try your best <br>";
  $trainingDay++;
}

echo "<hr>";
//constants testing
define("FRIDAY", "Today is friday in Calfonia");

for ($i = 0; $i < 7; $i++)
{
    if($i==5)
    {
        echo FRIDAY;
    }
}

echo "<hr>";
//rand() math() dowhile() testing
$x = 0;
$y = 0;

do
{

$random = rand(0,10); //build-in fuction using
echo "The number is: $random <br>";
  if ($random == 6)
  {
    $y++;
    echo "number of time we got 6 is " . $y ."<br>";
  }
  $x++;
} while ($x <= 5);

echo "<hr>";
//array testing
$foods = array("sushi", "soba", "mapotofu");
echo "I like " . $foods[0] . ", " . $foods[1] . " and " . $foods[2] . ". <br>";

//array count testing
echo "Total food available :" . count($foods) ."<br>" ;
$arrlength = count($foods);

for($x = 0; $x < $arrlength; $x++) 
{
    echo $foods[$x];
    echo "<br>";
}

echo "<hr>";
//Sorting array

echo "Sorted array <br>";
sort($foods);

for($x = 0; $x < $arrlength; $x++) 
{
    echo $foods[$x];
    echo "<br>";
}

//Sortin number array
echo "Number Array <br>";

$numbers = array(4, 6, 2, 22, 11);
$arrlength = count($numbers);

for($x = 0; $x < $arrlength; $x++) 
{
    echo $numbers[$x] . " ";

    
}

echo "<br>";
echo "Sorted Number Array Asc <br>";

sort($numbers);
$arrlength = count($numbers);

for($x = 0; $x < $arrlength; $x++) 
{
    echo $numbers[$x];
    echo "<br>";
}

echo "<hr>";
//user define function testing
echo "define function <br>";

function add($a, $b)
{
    echo "The total is :" . $a+$b ;
}

$a = 3;
$b = 3;
add($a, $b); // using define fuction with parameter

echo " <br> function return <br>";

function inv_add($a, $b)
{
    return $a + $b;
}

$inv = inv_add($a, $b);
echo "The total number is :" . $inv;
echo "<hr>";

$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>


</body>
</html>