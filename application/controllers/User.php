<?php
defined('BASEPATH') or die("Sem Permissão");

class User extends CI_Controller{
  public function index(){
    if(!$this->session->userdata('user')){
      $this->login();
    }else{
      redirect("/tarefas");
    }
  }

  public function login(){
    $page_data = array(
      'page_content' => "public/login",
    );

    $this->load->view("public/base", $page_data);
  }

  public function authenticate($email = false, $password = false){
    if(!$email){
      $email = $this->input->post('email');
      $password = $this->input->post('password');
    }

    $this->load->model('UserModel');

    $user = $this->UserModel->searchByEmail($email);

    if(!$user){
      $this->session->set_flashdata('error', 'Usuário não encontrado');
      $this->session->set_flashdata('email', $email);
      redirect("/");
    }

    if(!password_verify($password, $user->password)){
      $this->session->set_flashdata('error', 'Senha Incorreta');
      $this->session->set_flashdata('email', $email);
      redirect("/");
    }

    $this->session->set_userdata('user', $user);
    $this->session->set_flashdata('success', "Bem vindo $user->name");
    redirect("/tarefas");
  }

  public function insert(){
    $newUser = new stdClass();
    $newUser->name = html_escape($this->input->post('name'));
    $newUser->email = html_escape($this->input->post('email'));
    $newUser->password = password_hash(html_escape($this->input->post('password')), PASSWORD_BCRYPT);

    $this->load->model('UserModel');

    try {
      $this->UserModel->insert($newUser);
      $this->authenticate($newUser->email, $this->input->post('password'));
    } catch (Exception $e) {
      $this->session->set_flashdata("error", $e->getMessage());
    }

    redirect("/");
  }

  public function profile(){
    $user = authorize(1);

    $page = array(
      'user' => $user,
      'page_content' => 'user/profile',
    );

    $this->load->view('public/base', $page);
  }

  public function updateAccount(){
    $user = authorize(1);

    $this->load->model('UserModel');
    $this->load->model('TaskModel');

    $newEmail = html_escape($this->input->post('email'));
    if($newEmail != $user->email && $this->UserModel->searchByEmail($newEmail)){
      $this->session->set_flashdata('error', 'Já existe conta com este email');
      redirect('/perfil');
    }

    if($this->TaskModel->searchAll($user->email)){
      $this->TaskModel->updateFileName($user->email, $newEmail);
    }

    $this->UserModel->deleteByEmail($user->email);

    $user->name = html_escape($this->input->post('name'));
    $user->email = $newEmail;
    if($this->input->post('password') != ""){
      $user->password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
    }

    $this->UserModel->save($user);


    $this->session->set_flashdata('success', 'Perfil Atualizado');
    redirect('/perfil');
  }

  public function logout(){
    $this->session->unset_userdata('user');

    $this->session->set_flashdata('success', "Você saiu");
    redirect("/");
  }
}
