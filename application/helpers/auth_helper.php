<?php
  function authorize($level){
    /*
      1 - estar logado
    */

    $ci = get_instance();
    $user = $ci->session->userdata('user');

    if($level != 1 || !$user){
        $ci->session->set_flashdata('error', "Você precisa estar logado!");
        redirect("/");

    }

    return $user;
  }
?>
