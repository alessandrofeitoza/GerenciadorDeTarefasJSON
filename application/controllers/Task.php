<?php
defined('BASEPATH') or die("Sem Permissão");

class Task extends CI_Controller{
  public function index(){
    $this->load->model('TaskModel');

    $user = authorize(1);

    $tasks = $this->TaskModel->searchAll($user->email);

    $page = array(
      'page_content' => "task/list",
      'user' => $user,
      'tasks' => $tasks,
    );

    $this->load->view("public/base", $page);
  }

  public function insert(){
    $user = authorize(1);

    $this->load->model('TaskModel');

    $task = new stdClass();
    $task->title = html_escape($this->input->post('title'));
    $task->desc = html_escape($this->input->post('desc'));
    $task->created_in = date('d/m/Y H:i:s');
    $task->completed_in = "";
    $task->status = "";
    $task->priority = html_escape($this->input->post('priority'));

    $this->TaskModel->insert($task, $user->email);

    $this->session->set_flashdata('success', 'Nova Tarefa Inserida');

    redirect('/tarefas');
  }

  public function edit($id){
    $user = authorize(1);

    $task = $this->isMyTask($id, $user->email);

    $page = array(
      'page_content' => "task/edit",
      'user' => $user,
      'task' => $task,
      'id' => $id,
    );

    $this->load->view("public/base", $page);
  }

  public function update($id){
    $user = authorize(1);

    $task = $this->isMyTask($id, $user->email);

    $newData = new stdClass();
    $newData->title = html_escape($this->input->post('title'));
    $newData->desc = html_escape($this->input->post('desc'));
    $newData->priority = html_escape($this->input->post('priority'));
    $newData->status = $task->status;
    $newData->created_in = $task->created_in;
    $newData->completed_in = $task->completed_in;

    $this->TaskModel->updateById($user->email, $id, $newData);

    $this->session->set_flashdata('success', 'Tarefa Atualizada');

    redirect('/tarefas');
  }

  public function delete($id){
    $user = authorize(1);

    $task = $this->isMyTask($id, $user->email);

    $tasks = $this->TaskModel->deleteById($user->email, $id);

    $this->session->set_flashdata('success', 'Tarefa Excluída');

    redirect('/tarefas');
  }

  public function complete($id){
    $user = authorize(1);

    $task = $this->isMyTask($id, $user->email);

    $newData = new stdClass();
    $newData->title = $task->title;
    $newData->desc = $task->desc;
    $newData->status = "1";
    $newData->created_in = $task->created_in;
    $newData->completed_in = date('d/m/Y H:i:s');
    $newData->priority = $task->priority;

    $this->TaskModel->updateById($user->email, $id, $newData);

    $this->session->set_flashdata('success', 'Tarefa Concluída');

    redirect('/tarefas');
  }

  public function reopen($id){
    $user = authorize(1);

    $task = $this->isMyTask($id, $user->email);

    $newData = new stdClass();
    $newData->title = $task->title;
    $newData->desc = $task->desc;
    $newData->status = "";
    $newData->created_in = $task->created_in;
    $newData->completed_in = "";
    $newData->priority = $task->priority;

    $this->TaskModel->updateById($user->email, $id, $newData);

    $this->session->set_flashdata('success', 'Tarefa Reaberta');

    redirect('/tarefas');
  }

  public function isMyTask($id_task, $user_email){
    $this->load->model('TaskModel');

    $task = $this->TaskModel->searchById($user_email, $id_task);

    if(!$task){
      $this->session->set_flashdata('error', 'Tarefa não encontrada');
      redirect("/tarefas");
    }

    return $task;
  }
}
