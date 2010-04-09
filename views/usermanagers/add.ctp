<?php e($html->link('Regresar al listado completo de Usuarios',array('controller'=>'usermanager', 'action'=>'index'), array()));?>
<?php e("<h1>Editar Usuario</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Usermanager', array('controller' => 'usermanager', 'action' => 'edit', $this->data['User']['id']))); ?>
<?php e($form->hidden('User.id')); ?>

<?php e($form->error('User.username')); ?>
<?php e($form->input('User.username', array('size' => '80'))); ?>

<?php e($form->input('User.old_group_id', array('type' => 'hidden'))); ?>
<?php e($form->error('User.group_id')); ?>
<?php e($form->input('User.group_id', array('type' => 'select', 'options' => $userGroups, 'label' => 'Grupo de Usuario'))); ?>

<?php e($form->error('User.email')); ?>
<?php e($form->input('User.email', array('size' => '80', 'label' => 'E-mail'))); ?>

<?php e($form->error('User.new_passwd')); ?>
<?php e($form->input('User.new_passwd', array('type' => 'password', 'size' => '80', 'label' => 'Password'))); ?>    

<?php e($form->input('User.confirm_passwd', array('type' => 'password', 'size' => '80', 'label' => 'Re-Password'))); ?>

<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>

