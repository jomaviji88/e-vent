<?php e($html->link('Regresar al listado completo de Usuarios',array('controller'=>'usermanagers', 'action'=>'index'), array()));?>
<?php e("<h1>Editar Usuario</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Usermanager', array('controller' => 'usermanager', 'action' => 'edit', $this->data['User']['id']))); ?>
<?php e($form->hidden('User.id')); ?>

<?php e($form->error('User.username')); ?>
<?php e($form->input('User.username', array('size' => '80'))); ?>

<?php e($form->error('User.email')); ?>
<?php e($form->input('User.email', array('size' => '60', 'label' => 'E-mail'))); ?>

<?php e($form->error('User.title')); ?>
<?php e($form->input('User.title', array('size' => '10'))); ?>

<?php e($form->error('User.name')); ?>
<?php e($form->input('User.name', array('size' => '80'))); ?>

<?php e($form->error('User.first_name')); ?>
<?php e($form->input('User.first_name', array('size' => '80'))); ?>

<?php e($form->error('User.last_name')); ?>
<?php e($form->input('User.last_name', array('size' => '120'))); ?>

<?php e($form->error('User.team_id')); ?>
<?php e($form->input('User.team_id', array('type' => 'select', 'options' => $teamList, 'empty' => '--Ninguno--', 'label' => 'Equipo'))); ?>

<?php e($form->input('User.old_group_id', array('type' => 'hidden'))); ?>
<?php e($form->error('User.group_id')); ?>
<?php e($form->input('User.group_id', array('type' => 'select', 'options' => $userGroups, 'label' => 'Grupo de Usuario'))); ?>

<?php e($form->error('User.state_id')); ?>
<?php e($form->input('User.state_id', array('type' => 'select', 'options' => $listStates, 'label' => 'Estado'))); ?>

<?php e($form->error('User.school')); ?>
<?php e($form->input('User.school', array('size' => '120'))); ?>

<?php e($form->error('User.cellphone')); ?>
<?php e($form->input('User.cellphone', array('size' => '20'))); ?>

<?php e($form->error('User.new_passwd')); ?>
<?php e($form->input('User.new_passwd', array('type' => 'password', 'size' => '80', 'label' => 'Password'))); ?>    

<?php e($form->input('User.confirm_passwd', array('type' => 'password', 'size' => '80', 'label' => 'Re-Password'))); ?>

<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>

