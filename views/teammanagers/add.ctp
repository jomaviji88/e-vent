<?php echo $html->link('Regresar al listado completo de Equipos',array('controller'=>'teammanagers', 'action'=>'index'), array());?>
<?php e("<h1>Agregar Nueva Actividad</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Teammanager', array('controller' => 'teammanagers', 'action' => 'add'))); ?>

<?php e($form->error('Team.user_id')); ?>
<?php e($form->input('Team.user_id', array('type' => 'select', 'options' => $userList, 'label' => 'Líder de Equipo'))); ?>

<?php e($form->error('Team.name')); ?>
<?php e($form->input('Team.name', array('label' => 'Nombre de Equipo', 'size' => '80'))); ?>

<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>
