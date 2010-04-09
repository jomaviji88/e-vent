<div id="solocolumn">
	<div id="page_header"><h1><?php __('Informaci—n del Equipo');?></h1></div>
	<div id="primary">	
		<p><b>Nombre de Grupo:</b> <?php e($html->link($group['Group']['name'],array('controller' => 'groupmanagers', 'action' => 'view', $group['Group']['id']), null, false)); ?></p>
		<p><b>Grupo Hijo:</b> <?php e($html->link($group['Group']['parent_id'],array('controller' => 'groupmanagers', 'action' => 'view', $group['Group']['parent_id']), null, false)); ?></p>
	</div>
</div>