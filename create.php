<?php
require 'classes/app.class.php';
//outside class
$app = new App();

?>


<h3> Create New </h3>
<a href="./">Home </a>
<br>
<form method="POST">
  <p>
    <label> Full Name </label>
    <br>
    <input type="text" name="fname">
  </p>
  <p>
    <label> Email Address </label>
    <br>
    <input type="text" name="email">
  </p>
  <input type="submit" name="sub" value="Create">
</form>

<?php

  if(isset($_POST['sub']))
  {
    $fname = $_POST['fname'];
    $email = $_POST['email'];

    echo $update = $app->create($fname, $email);
  }


?>
