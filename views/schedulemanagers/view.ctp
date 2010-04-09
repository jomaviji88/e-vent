<div id="solocolumn">
	<div id="page_header"><h1><?php __('Informaci—n de la Actividad Agendada');?></h1></div>
	<div id="primary">	
		<p><b>Nombre Corto:</b> <?php e($html->link($schedule['Activity']['short_name'],array('controller' => 'schedulemanagers', 'action' => 'view', $schedule['Schedule']['id']), null, false)); ?></p>
		<p><b>Fecha:</b> <?php e($html->link($schedule['Schedule']['start_date'],array('controller' => 'schedulemanagers', 'action' => 'view', $schedule['Schedule']['id']), null, false)); ?></p>
		<p><b>Slots:</b> <?php e($registered."/".$schedule['Schedule']['slots']); ?></p>
		<?php
		/*
foreach($schedule['User'] as $user) {
			e("<p><b>Ponente:</b> ".$html->link($user['name'],array('controller' => 'usermanager', 'action' => 'view', $user['id']), null, false)."</p>");
		}
*/
		?>
		<p><b>Descripci—n:</b> <?php e($schedule['Activity']['description']); ?></p>
		<?php
			e("<ul>");
			foreach($schedule['User'] as $user) {
				e("<li>".$html->link($user['username'],array('controller' => 'usermanagers', 'action' => 'view', $user['id']),null,false)."</li>");
			}
			e("</ul>");
		?>
	</div>
</div>