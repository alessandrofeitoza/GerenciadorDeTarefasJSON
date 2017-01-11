<?php
  function priority_task($priority){
    $label = 'info';
    if($priority == 'Baixa'){
      $label = 'default';
    }else if($priority == 'Alta'){
      $label = 'warning';
    }

    return $label;
  }

  function status_task($priority){
    $label = 'info';
    if($priority == 'Baixa'){
      $label = 'default';
    }else if($priority == 'Alta'){
      $label = 'warning';
    }

    return $label;
  }
?>
