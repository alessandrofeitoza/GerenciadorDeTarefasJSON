<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Gerenciador de Tarefas Simples</title>
    <meta name="description" content="Pequena aplicação para gerenciar tarefas estilo todoist feito com PHP e JSON">
    <meta name="keywords" content="PHP, JSON, CodeIgniter, Tarefas, Todoist">
    <meta name="author" content="Alessandro Feitoza">
    <meta charset="utf-8">

    <link rel="icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url('assets/materialloginform/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>">

    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  </head>

  <body>
    <div class="container">
      <?php $this->load->view($page_content); ?>

      <footer class="footer text-right">
        <hr>
        <p><strong>TaskPower</strong> | <?php echo date('Y'); ?><br></p>
        Desenvolvido por <a target="_blank" href="http://www.alessandrofeitoza.eu/curriculo">Alessandro Feitoza</a>
      </footer>
    </div>
  </body>
</html>
