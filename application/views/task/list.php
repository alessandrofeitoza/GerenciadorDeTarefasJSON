<?php $this->load->view("user/navbar", array('user'=>$user)); ?>

<script>
  $( document ).ready(function() {
    //datatables
    $('#table_tasks').DataTable();


    $('[data-placement="top"]').tooltip();

    $('[data-target="#deleteTask"]').on("click", function(){
      $('#confirmDeleteTask').attr('href','excluir/'+$(this).val());
    });
    $('[data-target="#completeTask"]').on("click", function(){
      $('#confirmCompleteTask').attr('href','concluir/'+$(this).val());
    });
    $('[data-target="#reopenTask"]').on("click", function(){
      $('#confirmReopenTask').attr('href','reabrir/'+$(this).val());
    });
    });
  </script>

  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/datatables.bootstrap.min.css'); ?>">
  <script src="<?php echo base_url('assets/datatables/js/jquery.datatables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/datatables.bootstrap.min.js'); ?>"></script>

<div class="row">
  <div class="col-lg-12">
    <div class="container">
      <br>
      <div class="card" style="padding: 5px;">
        <h1 class="title">Vamos dominar o mundo hoje?</h1>
        <a href="#addTask" class="btn btn-default" data-toggle="modal"><span class="fa fa-plus-circle"></span> Nova Tarefa</a>
        <br><br>
        <?php
          if(!$tasks){
            echo '<div class="alert alert-info">';
            echo '<strong>Você ainda não tem tarefas!</strong> ';
            echo '<a href="#addTask" data-toggle="modal" class="alert-link">Criar Nova</a>';
            echo '</div>';
          }else{
            echo '<table class="table table-hover table-striped " id="table_tasks">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th>Titulo</th>';
                  echo '<th>Descrição</th>';
                  echo '<th>Criou em</th>';
                  echo '<th>Completou em</th>';
                  echo '<th>Status</th>';
                  echo '<th>Opções</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                foreach($tasks as $id=>$eachTask){
                  echo '<tr>';
                    echo '<td>',$eachTask->title,'</td>';
                    echo '<td>',$eachTask->desc,'</td>';
                    echo '<td>',$eachTask->created_in,'</td>';
                    echo '<td>',$eachTask->completed_in,'</td>';
                    echo '<td>';
                      echo ($eachTask->status == "")?'<span class="label label-default">Aguardando<span>':'<span class="label label-success">Concluída<span>';
                    echo '</td>';
                    echo '<td>';
                      echo '<button data-placement="top" title="Excluir" data-target="#deleteTask" value="',$id,'" data-toggle="modal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></button> ';
                      echo '<a data-placement="top" title="Editar" href="',base_url('editar/'.$id),'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a> ';


                      echo ($eachTask->status == "")?'<button data-placement="top" title="Concluir" data-target="#completeTask" value="'.$id.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-ok"></span></button>':'<button data-placement="top" title="Reabrir" data-target="#reopenTask" value="'.$id.'" data-toggle="modal" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-remove-circle"></span></button>';

                    echo '</td>';
                  echo '</tr>';
                }
              echo '</tbody>';
            echo '</table>';
          }
        ?>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nova Tarefa</h4>
      </div>
      <div class="modal-body">
        <?php
          $this->load->view("task/add");
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Excluir -->
<div class="modal fade" id="deleteTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nova Tarefa</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja excluir esta tarefa?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmDeleteTask" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Concluir -->
<div class="modal fade" id="completeTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Concluir Tarefa</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja concluir esta tarefa?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmCompleteTask" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reabrir -->
<div class="modal fade" id="reopenTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reabrir Tarefa</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja reabrir esta tarefa?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmReopenTask" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detalhes -->
<div class="modal fade" id="reopenTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalhes da Tarefa</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja reabrir esta tarefa?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmReopenTask" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
