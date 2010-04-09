<?php e($html->link('Regresar al listado completo de Actividades',array('controller'=>'activitymanagers', 'action'=>'index'), array()));?>
<?php e("<h1>Editar Actividad</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Activitymanagers', array('controller' => 'Activitymanagers', 'action' => 'edit', $this->data['Activity']['id']))); ?>
<?php e($form->hidden('Activity.id')); ?>

<?php e($form->input('Activity.id', array('type' => 'hidden'))); ?>

<?php e($form->error('Activity.short_name')); ?>
<?php e($form->input('Activity.short_name', array('label' => 'Nombre Corto', 'size' => '60'))); ?>

<?php e($form->error('Activity.long_name')); ?>
<?php e($form->input('Activity.long_name', array('label' => 'Nombre Largo', 'size' => '120'))); ?>

<?php e($form->error('Activity.type')); ?>
<?php e($form->input('Activity.type', array('type' => 'select', 'options' => $optionsType, 'label' => 'Tipo'))); ?>

<?php e($form->error('User.User')); ?>
<?php e($form->input('User.User', array('type' => 'select', 'multiple' => true, 'options' => $optionsUsers, 'label' => 'Ponente(s)'))); ?>

<?php e($form->error('Activity.description')); ?>
<?php e($form->input('Activity.description', array('label' => 'Descripci—n'))); ?>

<?php e($form->error('Activity.published')); ?>
<?php e($form->input('Activity.published', array('type' => 'checkbox', 'value' => true, 'label' => 'Publicado'))); ?>

<?php e($form->submit('Editar Actividad', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>
