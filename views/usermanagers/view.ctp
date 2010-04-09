<div id="solocolumn">
	<div id="page_header"><h1><?php __('Informaci—n del Usuario');?></h1></div>
	<div id="primary">	
		<p><b>Username:</b> <?php e($html->link($user['User']['username'],array('controller' => 'usermanagers', 'action' => 'view', $user['User']['id']), null, false)); ?></p>
		<p><b>T’tulo:</b> <?php e($user['User']['title']); ?></p>
		<p><b>Nombre:</b> <?php e($user['User']['first_name']); ?></p>
		<p><b>Apellido(s):</b> <?php e($user['User']['last_name']); ?></p>
		<p><b>Email:</b> <?php e($html->link($user['User']['email'],"mailto:".$user['User']['email'], null, false)); ?></p>
		<p><b>Grupo:</b> <?php e($html->link($user['Group']['name'],array('controller' => 'groups', 'action' => 'view', $user['Group']['id']), null, false)); ?></p>
		<p><b>Celular:</b> <?php e($user['User']['cellphone']); ?></p>
		<p><b>Escuela/Empresa:</b> <?php e($user['User']['school']); ?></p>
		<p><b>Creado:</b> <?php echo $user['User']['created']; ?></p>
		<p><b>Modificado:</b> <?php echo $user['User']['modified']; ?></p>
	</div>
</div>
