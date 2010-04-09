<div id="twocolumn">

<div id="page_header">
<h1>Edit User Info</h1>
</div>

<div id="primary">

<p>As a security precaution, there is no way to retrieve your password once you set it. If a password 
is forgotten, a temporary password can easily be sent to the email address in this record.</p>

<form method="post" action="<?php echo $html->url('/users/edit/'.$this->data['User']['id'] ); ?>">
    <?php echo $form->hidden('User.id'); ?>
	<?php echo $form->hidden('User.username'); ?>
	<?php echo $form->hidden('User.group_id'); ?>

	
    <label for="loginname">Username - only admins can modify this</label>
	<p id="loginname"><?php echo $this->data['User']['username']; ?></p>
    
    <?php echo $form->label('User.name', 'User Full Name'); ?>
    <?php echo $form->text('User.name', array('size' => '80')); ?>
    <?php echo $form->error('User.name'); ?>

    <?php echo $form->label('User.email', 'User E-mail'); ?>
    <?php echo $form->text('User.email', array('size' => '80')); ?>
    <?php echo $form->error('User.email'); ?>
        
	<?php echo $form->label('User.new_passwd', "New Password"); ?>
    <?php echo $form->error('User.new_passwd'); ?>
    <p class="form-instruction">Case sensitive, between 7 and 20 characters long.</p>
    <?php echo $form->text('User.new_passwd',  array('type' => 'password', 'size' => '80') ); ?>

	<?php echo $form->label('User.confirm_passwd', 'Re-type New Password'); ?>
    <?php echo $form->text('User.confirm_passwd',  array('type' => 'password', 'size' => '80') ); ?>

    <?php echo $form->submit('Save Changes'); ?>

</form>

</div><!-- END primary //-->

<div id="secondary">

</div><!-- END secondary //-->
</div><!-- END solocolumn //-->
