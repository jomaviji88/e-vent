<?php e($html->link('Regresar al listado completo de Actividades Agendadas',array('controller'=>'schedulemanagers', 'action'=>'index'), array()));?>
<?php e("<h1>Editar Actividad Agendada</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Schedulemanager', array('controller' => 'schedulemanagers', 'action' => 'edit', $this->data['Schedule']['id']))); ?>
<?php e($form->hidden('Schedule.id')); ?>

<?php e($form->error('Activity.short_name')); ?>
<?php e($form->input('Activity.short_name', array('size' => '60', 'label' => 'Nombre de Actividad'))); ?>

<?php e($form->error('Schedule.start_date')); ?>
<?php e($form->input('Schedule.start_date', array('label' => 'Fecha/Hora Inicio'))); ?>

<?php e($form->error('Schedule.end_date')); ?>
<?php e($form->input('Schedule.end_date', array('label' => 'Fecha/Hora Fin'))); ?>

<?php e($form->error('Schedule.slots')); ?>
<?php e($form->input('Schedule.slots', array('size' => '80'))); ?>

<?php e($form->error('User.User')); ?>
<?php e($form->input('User.User', array('type' => 'select', 'multiple' => 'checkbox', 'options' => $userList, 'label' => 'Usuarios Inscritos'))); ?>


<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>

