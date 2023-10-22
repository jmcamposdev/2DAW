<?php

/**
 * This is the View the main functionality is to show the information from the DDBB to the page
 */
  class UsersView extends Users {

    public function showUser($name) {
      $result = $this->getUser($name);
      echo "Full name: " . $result[0]['nombreusuario'];
    }
  }
?>