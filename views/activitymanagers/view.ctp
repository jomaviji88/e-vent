
<?php debug($activity['User']);?>
<div id="solocolumn">
	<div id="page_header"><h1><?php __('Informaci—n de la Actividad');?></h1></div>
	<div id="primary">	
		<p><b>Nombre Corto:</b> <?php e($html->link($activity['Activity']['short_name'],array('controller' => 'activitymanagers', 'action' => 'view', $activity['Activity']['id']), null, false)); ?></p>
		<p><b>Nombre Largo:</b> <?php e($html->link($activity['Activity']['long_name'],array('controller' => 'activitymanagers', 'action' => 'view', $activity['Activity']['id']), null, false)); ?></p>
		<p><b>Tipo:</b> <?php e($html->link($activity['Contenttype']['name'],array('controller' => 'contenttypes', 'action' => 'view', $activity['Contenttype']['id']), null, false)); ?></p>
		<?php
		foreach($activity['User'] as $user) {
			e("<p><b>Ponente:</b> ".$html->link($user['name'],array('controller' => 'usermanager', 'action' => 'view', $user['id']), null, false)."</p>");
		}
		?>
		<p><b>Descripci—n:</b> <?php e($activity['Activity']['description']); ?></p>
		<?php
		foreach($activity['Schedule'] as $schedule) {
			e("<p><b>".$schedule['start_date'].":</b> ".$schedule['slots']."</p>");
		}
		?>
		<p><b>Creado:</b> <?php e($activity['Activity']['created']); ?></p>
		<p><b>Modificado:</b> <?php e($activity['Activity']['modified']); ?></p>
	</div>
</div>