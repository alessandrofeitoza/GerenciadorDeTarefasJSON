<form action="<?php echo base_url('inserir'); ?>" method="post">
  <label for="title">Titulo</label>
  <input type="text" name="title" placeholder="O que você vai fazer?" class="form-control input-lg" required><br>

  <label for="desc">Descrição</label>
  <input type="text" name="desc" placeholder="Informe os detalhes" class="form-control input-lg" required><br>

  <label>Prioridade</label>
  <select name="priority" required class="form-control input-lg">
    <option>Baixa</option>
    <option selected>Normal</option>
    <option>Alta</option>
  </select>

  <button class="btn btn-block btn-lg btn-primary">ENVIAR</button>
</form>
