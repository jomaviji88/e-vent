<?php if( isset( $User['name'] ) ): ?>
<div id="login_status">
	<p>
	Has iniciado sesi—n como <a href="<?php echo $html->url('/users/view/'.$User['id'] ); ?>"><?php echo $User['name']; ?></a>. 
	[<a href="<?php echo $html->url("/users/logout"); ?>">logout</a>]
	</p>
	</div>
<?php else: ?>
<div id="login_status">
	<p>[<a href="<?php echo $html->url( '/users/login' ); ?>">login</a>]</p>
</div>
<?php endif; ?>
