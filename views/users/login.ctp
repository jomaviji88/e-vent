<div id="solocolumn">

<div id="page_header">
<h1>Log In</h1>
</div>

<div id="primary">

<?php echo $form->create('User',array('action' => 'login')); ?>
<fieldset class="form">
<?php echo $form->error('User.username'); ?>
<?php echo $form->input('User.username', array('label'=>'Username') ); ?>
<?php echo $form->error('User.passwd'); ?>
<?php echo $form->input('User.passwd', array('label'=>'Password') ); ?>
<?php if( $remember_me ): ?>
<fieldset class="checkbox">
<?php echo $form->checkbox('User.remember_me'); ?>
<?php echo $form->label('User.remember_me', 'stay logged in for 4 weeks?'); ?>
</fieldset>
<?php endif; ?>
<?php echo $form->submit('Submit', array('class' => 'submit')); ?>

</fieldset>
</form>

</div><!-- END primary //-->

</div><!-- END solocolumn //-->
