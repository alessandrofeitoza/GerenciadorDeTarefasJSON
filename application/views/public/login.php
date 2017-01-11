<?php validate_message(); ?>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
  <br><br>
  <div class="container">
    <div class="card"></div>
    <div class="card">

      <h1 class="title">Login</h1>
      <form action="<?php echo base_url('autenticar'); ?>" method="post">
        <div class="input-container">
          <input type="email" name="email" id="email" value="<?php echo $this->session->flashdata('email'); ?>" required="required"/>
          <label for="email">Email</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" name="password" id="password" required="required"/>
          <label for="password">Senha</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button><span>Entrar</span></button>
        </div>
      </form>
    </div>
    <div class="card alt">
      <div class="toggle"></div>
      <h1 class="title">Cadastro
        <div class="close"></div>
      </h1>

      <?php $this->load->view("user/add"); ?>

    </div>
  </div>
</div>
</div>
<script src="<?php echo base_url('assets/materialloginform/events.js'); ?>"></script>
