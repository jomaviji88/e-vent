<!-- File: users/index.ctp -->

<div id="solocolumn">
	<div id="page_header"><h1><?php __('Lista de Horarios');?></h1></div>
	<div id="primary">
		<table>
			<tr id="usersSorting">
				<th class="name"><?php echo $paginator->sort('Actividad','short_name');?></th>
				<th class="name"><?php echo $paginator->sort('Cupo','slots');?></th>
				<th class="name"><?php echo $paginator->sort('Fecha','start_date');?></th>
			</tr>
		
		<?php

		foreach($schedules as $schedule) {	
			echo $html->tableCells(
				array(
					array(
		           		$html->link($schedule['Activity']['short_name'],array('controller' => 'schedulemanagers', 'action' => 'view', $schedule['Schedule']['id']), null, false),
		           		$html->link($schedule['Schedule']['registered']."/".$schedule['Schedule']['slots'],array('controller' => 'schedulemanagers', 'action' => 'view', $schedule['Activity']['contenttype_id']), null, false),
		           		$html->link($schedule['Schedule']['start_date'],array('controller' => 'schedulemanagers', 'action' => 'view', $schedule['Activity']['contenttype_id']), null, false),
				        )
			      )
		    );
		}

		?>
		</table>
	<?php echo $html->div(null,$paginator->prev().' '.$paginator->numbers().' '.$paginator->next()); ?>
	</div>
</div>







