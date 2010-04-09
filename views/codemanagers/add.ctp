<?php 

/*
for($i = 71; $i < 91; $i++) {
	echo "INSERT INTO codes (id,coupon_id,code,discount,created,modified) VALUES('".$i."','1','".$i."','599.00',NOW(),NOW());";
}
*/

?>

<?php echo $html->link('Regresar al listado completo de Códigos',array('controller'=>'codemanagers', 'action'=>'index'), array());?>
<?php e("<h1>Agregar Nueva Actividad</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Codemanager', array('controller' => 'codemanagers', 'action' => 'add'))); ?>

<?php e($form->error('Code.coupon_id')); ?>
<?php e($form->input('Code.coupon_id', array('type' => 'select', 'options' => $couponList, 'label' => 'Cupón'))); ?>

<?php e($form->error('Code.user_id')); ?>
<?php e($form->input('Code.user_id', array('type' => 'select', 'empty'=> '--Ninguno--', 'options' => $userList, 'label' => 'Persona con cupón'))); ?>

<?php e($form->error('Code.code')); ?>
<?php e($form->input('Code.code', array('label' => 'Código', 'size' => '20'))); ?>

<?php e($form->error('Code.discount')); ?>
<?php e($form->input('Code.discount', array('label' => 'Descuento', 'size' => '20'))); ?>

<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>
