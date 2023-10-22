<?php 

/**
 * This is the Controller the main functionality is insert, update and delete information from the DDBB
 */
class UserContr extends Users {
  
  public function createUser($name, $pass, $phone, $date) {
    $this->setUser($name, $pass, $phone, $date);
  }
}
?>