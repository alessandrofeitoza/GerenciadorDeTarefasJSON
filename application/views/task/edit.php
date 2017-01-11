<?php $this->load->view('user/navbar', array('user'=>$user)); ?>

<br>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    <div class="container">
      <br>
      <div class="card">
        <h1 class="title">Atualizar Tarefa</h1>
        <form action="<?php echo base_url('atualizar/'.$id); ?>" method="POST">
          <div class="input-container">
            <input type="text" name="title" value="<?php echo $task->title; ?>" id="title" required>
            <label for="title">Titulo</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="text" name="desc" value="<?php echo $task->desc; ?>" id="desc" required>
            <label for="desc">Descrição</label>
            <div class="bar"></div>
          </div>

          <div class="input-container">
            <label style="color: #9d9d9d; font-size: 18px; margin-top:-30px;">Prioridade</label><br>
            <select id="priority" name="priority" required class="form-control input-lg">
              <option>Baixa</option>
              <option selected>Normal</option>
              <option>Alta</option>
            </select>
          </div>

          <div class="button-container">
            <button><span>Atualizar</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
