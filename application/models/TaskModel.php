<?php
defined('BASEPATH') or die ("Sem Permissão");

class TaskModel extends CI_Model{
  public function insert(stdClass $newTask, $email){
    $tasks = array();

    if(file_exists(FCPATH."database/tasks/$email.json")){
      $file = file_get_contents(FCPATH."database/tasks/$email.json");
      $tasks = json_decode($file);
    }

    $tasks[] = $newTask;

    TaskModel::save($email, $tasks);
  }

  public function searchAll($email){
    if(!file_exists(FCPATH."database/tasks/$email.json")){
      return false;
    }

    $file = file_get_contents(FCPATH."database/tasks/$email.json");

    $tasks = json_decode($file);

    return $tasks;
  }

  public function searchById($email, $id){
    $tasks = TaskModel::searchAll($email);

    if(!isset($tasks[$id])){
      return false;
    }

    return $tasks[$id];
  }

  public function updateById($email, $id, $newData){
    $tasks = TaskModel::searchAll($email);

    $tasks[$id] = $newData;

    TaskModel::save($email, $tasks);

    return true;
  }

  public function deleteById($email, $id){
    $tasks = TaskModel::searchAll($email);

    unset($tasks[$id]);

    array_multisort($tasks);

    TaskModel::save($email, $tasks);

    return true;
  }

  public function save($email, $tasks){
    $fileJson = json_encode($tasks, JSON_PRETTY_PRINT);

    file_put_contents(FCPATH."database/tasks/$email.json", $fileJson);

    return true;
  }

  public function updateFileName($email, $newEmail){
    $tasks = TaskModel::searchAll($email);
    unlink(FCPATH."database/tasks/$email.json");

    TaskModel::save($newEmail, $tasks);
    return true;
  }
}
