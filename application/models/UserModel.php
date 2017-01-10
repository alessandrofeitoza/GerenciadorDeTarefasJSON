<?php
defined('BASEPATH') or die ("Sem Permissão");

class UserModel extends CI_Model{
  public function insert(stdClass $newUser){
    if(file_exists(FCPATH."database/users/$newUser->email.json")){
      throw new Exception("Já existe uma conta para este email", 1);
      return false;
    }

    UserModel::save($newUser);
  }

  public function searchByEmail($email){
    if(!file_exists(FCPATH."database/users/$email.json")){
      return false;
    }

    $file = file_get_contents(FCPATH."database/users/$email.json");

    $user = json_decode($file);

    return $user;
  }

  public function deleteByEmail($email){
    unlink(FCPATH."database/users/$email.json");
    return true;
  }

  public function save($user){
    $fileJson = json_encode($user, JSON_PRETTY_PRINT);

    file_put_contents(FCPATH."database/users/$user->email.json", $fileJson);

    return true;
  }
}
