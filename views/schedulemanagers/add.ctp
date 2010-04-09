<?php echo $html->link('Regresar al listado completo de Actividades',array('controller'=>'schedulemanagers', 'action'=>'index'), array());?>
<?php e("<h1>Agregar Nueva Actividad</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Schedulemanager', array('controller' => 'schedulemanagers', 'action' => 'add'))); ?>

<?php e($form->error('Schedule.activity_id')); ?>
<?php e($form->input('Schedule.activity_id', array('type' => 'select','options' => $optionsActivities, 'label' => 'Actividad'))); ?>

<?php e($form->error('Schedule.place')); ?>
<?php e($form->input('Schedule.place', array('type' => 'select','options' => $optionsSites, 'label' => 'Lugar'))); ?>

<?php e($form->error('Schedule.start_date')); ?>
<?php e($form->input('Schedule.start_date', array('label' => 'Fecha Inicio'))); ?>

<?php e($form->error('Schedule.end_date')); ?>
<?php e($form->input('Schedule.end_date', array('label' => 'Fecha Fin'))); ?>

<?php e($form->error('Schedule.slots')); ?>
<?php e($form->input('Schedule.slots', array('label' => 'Cupo'))); ?>

<?php e($form->error('Schedule.status')); ?>
<?php e($form->input('Schedule.status', array('type' => 'select', 'options' => $optionsStatus, 'label' => 'Status'))); ?>

<?php e($form->error('Schedule.published')); ?>
<?php e($form->input('Schedule.published', array('type' => 'checkbox', 'value' => true, 'label' => 'Publicado'))); ?>

<?php e($form->submit('Agendar Actividad', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>