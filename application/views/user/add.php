<form action="<?php echo base_url('usuario/inserir'); ?>" method="post">
  <div class="input-container">
    <input type="text" name="name" id="username" required="required"/>
    <label for="username">Nome</label>
    <div class="bar"></div>
  </div>
  <div class="input-container">
    <input type="email" name="email" id="email" required="required"/>
    <label for="email">Email</label>
    <div class="bar"></div>
  </div>
  <div class="input-container">
    <input type="password" name="password" id="password" required="required"/>
    <label for="password">Senha</label>
    <div class="bar"></div>
  </div>

  <div class="button-container">
    <button class="btn btn-default"><span>Pronto!</span></button>
  </div>
</form>
