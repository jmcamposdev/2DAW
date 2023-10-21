<?php

class Test extends Dbh {

  /**
   * Gets all users from the database
   */
  public function getUsers() {
    // Create the SQL query
    $sql = "SELECT * FROM USUARIOS";
    // Execute the query and return the results
    $stmt = $this->connect()->query($sql);
    // Fetch the results as an associative array
    while ($row = $stmt->fetch()) {
      echo $row['nombreusuario'] . ' ' . $row['telefono'];
    }
  }

    /**
   * Get users with prepared statements 
   * Filter by name and phone
   */
  public function getUsersStmt(string $nombreUsuario, string $telefono) {
    // Create the prepared statement
    $sql = "SELECT * FROM USUARIOS WHERE nombreusuario = ? AND telefono = ?";
    // Prepare the statement
    $stmt = $this->connect()->prepare($sql);
    // Execute the prepared statement and pass the parameters as an array 
    $stmt->execute([$nombreUsuario, $telefono]);
    // Fetch the results as an associative array
    $names = $stmt->fetchAll();

    // Loop through the associative array and print the results
    foreach ($names as $name) {
      echo $name['nombreusuario'] . ' ' . $name['telefono'];
    }
  }
}