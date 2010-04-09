<h2>Add a Group to the System</h2>

<form method="post" action="<?php echo $html->url('/gatekeeper/groups/add')?>">
    
    <?php echo $form->label('Group.name', 'Name of Group'); ?>
		<?php echo $form->text('Group.name', array('size' => '80') ); ?>

    <?php echo $form->label('Group.parent_id', 'Parent Group' ); ?>
        <?php echo $form->error('Group.parent_id', 'You must select a user group'); ?>
        <?php echo $form->select('Group.parent_id', $parents, $form->value('Group.parent_id') ); ?>

<?php echo $form->submit('Add new group'); ?>

</form>
