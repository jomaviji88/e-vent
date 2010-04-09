<?php e($html->link('Regresar al listado completo de Grupos',array('controller'=>'groupmanagers', 'action'=>'index'), array()));?>
<?php e("<h1>Editar Grupo</h1>"); ?>

<?php $session->flash('flash'); ?>
<?php e($form->create('Groupmanager', array('controller' => 'groupmanagers', 'action' => 'edit', $this->data['Group']['id']))); ?>

<?php e($form->error('Group.name')); ?>
<?php e($form->input('Group.name', array('label' => 'Nombre de Grupo'))); ?>

<?php e($form->error('Group.parent_id')); ?>
<?php e($form->input('Group.parent_id', array('type' => 'select', 'empty' => '--Ninguno--', 'options' => $groupList, 'label' => 'Grupo Hijo'))); ?>

<?php e($form->submit('Guardar', array('class' => 'submit'))); ?>
<?php e($form->end()); ?>

