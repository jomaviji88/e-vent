<?php echo $form->create('SecretRecipe'); ?>
<?php echo $form->hidden('SecretRecipe.id'); ?>
<?php echo $form->hidden('SecretRecipe.user_id'); ?>
<?php echo $form->label('SecretRecipe.title', 'Secret Recipe Title'); ?>
<?php echo $form->error('SecretRecipe.title'); ?>
<?php echo $form->text('SecretRecipe.title', array('size' => '70') ); ?>

<?php echo $form->label('SecretRecipe.date', 'Publication Date'); ?>
<?php echo $form->dateTime('SecretRecipe.date', 'MDY', '12', $dateString, array('maxYear'=>2010, 'minYear'=>1998) ); ?>

<?php echo $form->label('SecretRecipe.content', 'Secret Recipe'); ?>
<?php echo $form->error('SecretRecipe.content'); ?>
<?php echo $form->textarea('SecretRecipe.content', array('rows' => 10, 'cols' => 55) ); ?>

<?php echo $form->submit('save'); ?>

<?php echo $form->end(); ?>



