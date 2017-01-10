<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <span class="fa fa-check-circle"></span>
        Tarefas do Poder
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="text-right">
        <label style="color: #fff; "><?php echo $user->name; ?></label><br>

        <a href="<?php echo base_url('perfil'); ?>" class="btn btn-default btn-xs"><span class="fa fa-user"></span> Perfil</a>
        <a href="<?php echo base_url('sair'); ?>" class="btn btn-default btn-xs"><span class="fa fa-sign-out"></span> Sair</a>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php validate_message(); ?>
