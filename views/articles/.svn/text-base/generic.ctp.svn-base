<?php echo $form->create('Article'); ?>
<?php echo $form->hidden('Article.id'); ?>

<?php echo $form->label('Article.title', 'Article Title'); ?>
<?php echo $form->error('Article.title'); ?>
<?php echo $form->text('Article.title', array('size' => '80') ); ?>

<?php echo $form->label('Article.date', 'Publication Date'); ?>
<?php echo $form->dateTime('Article.date', 'MDY', '12', $dateString, array('maxYear'=>2010, 'minYear'=>1998) ); ?>

<?php echo $form->label('Article.content', 'Article Content'); ?>
<?php echo $form->error('Article.content'); ?>
<?php echo $form->textarea('Article.content', array('rows' => 10, 'cols' => 70) ); ?>

<?php echo $form->submit('save'); ?>

<?php echo $form->end(); ?>



