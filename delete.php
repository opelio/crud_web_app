<?php
require 'classes/app.class.php';
//outside class
$app = new App();

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $app->delete($id);
} else {
  header('location: index.php');
}
?>
