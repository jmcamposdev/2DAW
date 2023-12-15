<?php

  /**
   * Esta clase es el Modelo de la Arquitectura MVC (Modelo Vista Controlador).
   * La función de este modelo es realizar las conexiones con la BBDD y retornar los resultados
   */
  class Users extends Dbh{
    
    protected function getUser($name, $pass) {
      $sql = "SELECT * FROM USUARIOS WHERE nombreusuario = ? AND password = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $pass]);  

      $result = $stmt->fetchAll();
      return $result;
    }

    protected function setUser($name, $pass, $phone, $date) {
      $sql = "INSERT INTO USUARIOS(nombreusuario, password, telefono, fechentrega) VALUES (?, ?, ?, ?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $pass, $phone, $date]);  
    }
  }
?>