<?php 

/**
 * This is the Controller the main functionality is insert, update and delete information from the DDBB
 */
class UsersContr extends Users {
  
  public function createUser($name, $pass, $phone, $date) {
    $this->setUser($name, $pass, $phone, $date);
  }

  public function loginUser($name, $pass) {
    session_start();
    $_SESSION['username'] = $name;
    $_SESSION['password'] = $pass;

    if ($this->getUser($name, $pass)) {
      return true;
    } else {
      return false;
    }
  }

  public function logoutUser() {
    session_start();
    session_unset();
    session_destroy();

    header("location: ../index.php");
  }

  public function validateUser($name, $pass) {
    if ($this->getUser($name, $pass)) {
      return true;
    } else {
      return false;
    }
  }


}
?>