<?php


  $filename = $_POST['delete_file'];
  echo $filename; //full path
  if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
  }
  $files = glob("yair/*.*");

  for ($i=0; $i<count($files); $i++) {
      $image = $files[$i];
      
      echo '<form method="post">';
      echo '<td><img src="'. $image .'" alt="Random image" class="show-img" />';
      echo '<input type="hidden" value="'.$image.'" name="delete_file" />';
      
      
      echo '<input type="submit" value="Delete" class="delete"></td>';
      echo '</form>';
  }

//$file = 'yair/Screenshot (26).png';
//echo '<form method="post">';
//echo '<input type="hidden" value="'.$file.'" name="delete_file" />';
//echo '<input type="submit" value="Delete image" class="submit"/>';
//echo '</form>';
//
//$file = 'yair/Screenshot (4).png';
//echo '<form method="post">';
//echo '<input type="hidden" value="'.$file.'" name="delete_file" />';
//echo '<input type="submit" value="Delete image" class="submit"/>';
//echo '</form>';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
</body>
</html>