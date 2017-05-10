<?php
require 'classes/app.class.php';
//outside class
$app = new App();

$id = $_GET['id'];

$edit = $app->edit($id);

if ( $edit->rowCount() > 0 ) {

  $fetch = $edit->fetch();
?>


<h3> Edit Data </h3>
<a href="./">Home </a>
<br>
<form method="POST">
  <p>
    <label> Full Name </label>
    <br>
    <input type="text" name="fname" value="<?=$fetch['fname']?>">
  </p>
  <p>
    <label> Email Address </label>
    <br>
    <input type="text" name="email" value="<?php echo $fetch['email']?>">
  </p>
  <input type="submit" name="sub" value="Update">
</form>

<?php

  if(isset($_POST['sub']))
  {
    $fname = $_POST['fname'];
    $email = $_POST['email'];

    echo $update = $app->update($fname, $email, $id );
  }

} else {

   header('location: index.php');
}

?>
