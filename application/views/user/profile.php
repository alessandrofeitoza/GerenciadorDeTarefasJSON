<?php $this->load->view('user/navbar', array('user'=>$user)); ?>

<br>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    <div class="container">
      <br>
      <div class="card">
        <h1 class="title">Minha Conta</h1>
        <form action="<?php echo base_url('usuario/atualizar'); ?>" method="POST">
          <div class="input-container">
            <input type="text" name="name" value="<?php echo $user->name; ?>" id="name" required>
            <label for="name">Nome</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="email" name="email" value="<?php echo $user->email; ?>" id="email" required>
            <label for="email">Email</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="password" name="password" id="password">
            <label for="password">Senha</label>
            <div class="bar text-right"><em>Digite para alterar</em></div>
          </div>

          <div class="button-container">
            <button><span>Atualizar</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
