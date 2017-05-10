<?php
require 'classes/app.class.php';
//outside class
$app = new App();

$get = $app->retrieve();

echo "<h3> Crud App</h3>
 <a href='create.php'>Create New+</a>";


if(isset($_GET['message']) and $_GET['message'] == 'true' )
{
  echo "<p><b style='color: green'>Record Deleted Successfully !</b></p>";
}

if(isset($_GET['message']) and $_GET['message'] == 'false' )
{
  echo "<p><b style='color: green'>No Record to delete !</b></p>";
}

if ( $get->rowCount() > 0 )
{

  //$fetch =
  while($ft = $get->fetch()) {
    echo "<p>Full Name: {$ft['fname']}</p>";
    echo "<p>Email Address: {$ft['email']}</p>";
    echo "<p><a href='edit.php?id=".$ft['id']."'>Edit</a> &nbsp; <a href='delete.php?id=".$ft['id']."' style='color:red'>remove &times;</a></p>";
    echo "<hr>";
  }

} else {

   echo "<p>oOps no record available </p>";
}
