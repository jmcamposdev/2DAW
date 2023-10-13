<?php
  include 'function.php';
  $array = array(2, 2, 3, 4, 5);
  echo estaEnArrayInt($array, 10) ? 'true' : 'false';

  foreach ($_SERVER as $key => $value) {
    echo $key . $value . "<br>";
  }
  

  function generaArrayInt($longitud, $minimo, $maximo) {
    if ($longitud <= 0) {
      return null;
    }
    if ($minimo > $maximo) {
      return null;
    }

    $newArray = array();
    for ($i=0; $i < $longitud; $i++) { 
      array_push($newArray, rand($minimo, $maximo));
    }

    return $newArray;
  }

  // print_r(generaArrayInt(10, 0, 10))

  function minimoArrayInt($array) {
    $minimoValue = $array[0];

    foreach ($array as $value) {
      if ($value < $minimoValue) {
        $minimoValue = $value;
      }
    }
    return $minimoValue;
  }

  // echo minimoArrayInt($array);

  function maximoArrayInt($array) {
    $minimoValue = $array[0];

    foreach ($array as $value) {
      if ($value > $minimoValue) {
        $minimoValue = $value;
      }
    }
    return $minimoValue;
  }

  // echo maximoArrayInt($array);

  function mediaArrayInt($array) {
    $suma = 0;
    
    foreach ($array as $value) {
      $suma += $value;
    }

    return $suma/count($array);
  }

  // echo mediaArrayInt($array);

  
  function posicionEnArray($array, $numeroABuscar) {
    $isFound = false;
    $indice = -1;

    for ($i=0; $i < count($array) && !$isFound; $i++) { 
      if ($array[$i] == $numeroABuscar) {
        $indice = $i;
        $isFound = true;
      }
    }
    
    return $indice;
  }

  //echo posicionEnArray($array, 0);

  function volteaArrayInt($array) {
    $arrayVolteado = array();
    for ($i=count($array)-1; $i >= 0 ; $i--) { 
      array_push($arrayVolteado, $array[$i]);
    }
    return $arrayVolteado;
  }

  // print_r( volteaArrayInt($array));

  function rotaDerechaArrayInt($array, $offset) {
    $subArray = array_slice($array, 0, abs(count($array)-$offset));
    $array = array_slice($array, abs(count($array)-$offset));
    return array_merge($array, $subArray);
  }

  // print_r(rotaDerechaArrayInt($array, 2));

  function rotaIzquierdaArrayInt($array, $offset) {
    $subArray = array_slice($array, 0, $offset);
    $array = array_slice($array, $offset);
    return array_merge($array, $subArray);
  }
  
  // print_r(rotaIzquierdaArrayInt($array, 2));


?>