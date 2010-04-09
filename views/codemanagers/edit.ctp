<?php echo $html->link('Regresar al listado completo de C—digos',array('controller'=>'codemanagers', 'action'=>'index'), array());?>
<?php e("<h1>Agregar Nueva Actividad</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Codemanager', array('controller' => 'codemanagers', 'action' => 'add'))); ?>
<?php e($form->hidden('Code.id')); ?>

<?php e($form->error('Code.coupon_id')); ?>
<?php e($form->input('Code.coupon_id', array('type' => 'select', 'options' => $couponList, 'label' => 'Cup—n'))); ?>

<?php e($form->error('Code.user_id')); ?>
<?php e($form->input('Code.user_id', array('type' => 'select', 'empty'=> '--Ninguno--', 'options' => $userList, 'label' => 'Persona con cup—n'))); ?>

<?php e($form->error('Code.code')); ?>
<?php e($form->input('Code.code', array('label' => 'C—digo', 'size' => '20'))); ?>

<?php e($form->error('Code.discount')); ?>
<?php e($form->input('Code.discount', array('label' => 'Descuento', 'size' => '20'))); ?>

<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>
