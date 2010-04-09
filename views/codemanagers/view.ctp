<div id="solocolumn">
	<div id="page_header"><h1><?php __('Informaci—n del Equipo');?></h1></div>
	<div id="primary">	
		<p><b>L’der:</b> <?php e($html->link($team['User']['name'],array('controller' => 'teammanagers', 'action' => 'view', $team['User']['id']), null, false)); ?></p>
		<p><b>Nombre de Equipo:</b> <?php e($html->link($team['Team']['name'],array('controller' => 'teammanagers', 'action' => 'view', $team['Team']['id']), null, false)); ?></p>
	</div>
</div>