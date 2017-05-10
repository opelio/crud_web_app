<?php

/**
 *
 */
class App
{
  private $pdo;
  public function __construct()
  {
    try{
      $this->pdo = new PDO("mysql:host=localhost;dbname=yourba_web_oop", "root", "" );
      //echo "Connected !";
    }catch(PDOException $e) {
      echo "Unable to connect to DB {$e->getMessage}";
    }
  }

  public function create($fname, $email)
  {
    $sql = $this->pdo->query("SELECT * FROM crud WHERE fname='{$fname}' OR email='{$email}'");
    if($sql->rowCount() > 0 ){
      return "Record already exist !";
    } else  {
      $insert = $this->pdo->query("INSERT INTO crud(fname, email) VALUES('{$fname}', '{$email}')");

      if($insert->rowCount() > 0 ){
        return "Record Created Successfully !";
      } else {
        return "Error";
      }
    }
  }

  public function retrieve()
  {
    $sql = $this->pdo->query("SELECT * FROM crud ORDER BY id DESC");
    return $sql;
  }

  public function update($f, $e, $id )
  {
    $sql = $this->pdo->query("UPDATE crud SET fname='{$f}', email='{$e}' WHERE id='{$id}'");
    if($sql->rowCount() > 0 ){
      return "Record Updated";
    } else {
      return "Not record to update";
    }
  }

  public function delete($id)
  {
    $sql = $this->pdo->query("DELETE FROM crud WHERE id='{$id}'");
    if($sql->rowCount() > 0 ){
      header('location:index.php?message=true');
    } else {
      header('location:index.php?message=false');
    }
  }

  public function edit($id)
  {
    $sql = $this->pdo->query("SELECT * FROM crud WHERE id='{$id}'");
    return $sql;
  }

}
