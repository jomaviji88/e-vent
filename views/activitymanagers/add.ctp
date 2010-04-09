<?php e($html->link('Regresar al listado completo de Actividades',array('controller'=>'activitymanagers', 'action'=>'index'), array()));?>
<?php e("<h1>Agregar Nueva Actividad</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Activitymanager', array('controller' => 'activitymanagers', 'action' => 'add'))); ?>

<?php e($form->error('Activity.short_name')); ?>
<?php e($form->input('Activity.short_name', array('label' => 'Nombre Corto', 'size' => '60'))); ?>

<?php e($form->error('Activity.long_name')); ?>
<?php e($form->input('Activity.long_name', array('label' => 'Nombre Largo', 'size' => '120'))); ?>

<?php e($form->error('Activity.type')); ?>
<?php e($form->input('Activity.type', array('type' => 'select', 'options' => $optionsType, 'label' => 'Tipo'))); ?>

<?php e($form->error('User.User')); ?>
<?php e($form->input('User.User', array('type' => 'select', 'multiple' => true, 'options' => $optionsUsers, 'label' => 'Ponente(s)'))); ?>

<?php e($form->error('Activity.description')); ?>
<?php e($form->input('Activity.description', array('label' => 'Descripción'))); ?>

<?php e($form->error('Activity.published')); ?>
<?php e($form->input('Activity.published', array('type' => 'checkbox', 'value' => true, 'label' => 'Publicado'))); ?>

<?php e($form->submit('Agregar Actividad', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>
