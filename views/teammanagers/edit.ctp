<?php e($html->link('Regresar al listado completo de Equipos',array('controller'=>'teammanagers', 'action'=>'index'), array()));?>
<?php e("<h1>Editar Actividad Agendada</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Teammanager', array('controller' => 'teammanagers', 'action' => 'edit', $this->data['Team']['id']))); ?>
<?php e($form->hidden('Team.id')); ?>

<?php e($form->error('Team.name')); ?>
<?php e($form->input('Team.name', array('label' => 'Nombre de Equipo'))); ?>

<?php e($form->error('Team.user_id')); ?>
<?php e($form->input('Team.user_id', array('type' => 'select', 'options' => $userList, 'label' => 'L’der de Equipo'))); ?>

<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>

