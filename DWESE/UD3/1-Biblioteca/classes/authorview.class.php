<?php

class AuthorView extends Author {

  /**
   * Show the authors like options in a select
   */
  public function showAuthorsSelectOptions($name, $surname) {
    $results = $this->getAuthors();
    $html = "";
    foreach ($results as $result) {
      if ($result['nombre'] == $name && $result['apellidos'] == $surname) {
        $html .= "<option value='" . $result['id_autor'] . "' selected>" . $result['nombre'] . " " . $result['apellidos'] . "</option>";
      } else {
        $html .= "<option value='" . $result['id_autor'] . "'>" . $result['nombre'] . " " . $result['apellidos'] . "</option>";
      }
    }
    return $html;
  }
}