<!-- File: users/index.ctp -->

<div id="solocolumn">
	<div id="page_header"><h1><?php __('Lista de Actividades');?></h1></div>
	<div id="primary">
		<table>
			<tr id="usersSorting">
				<th class="name"><?php echo $paginator->sort('Actividad','short_name');?></th>
				<th class="name"><?php echo $paginator->sort('Tipo','name');?></th>
				
				<?php 

			foreach($dates as $date) {
				e("<th class='name'>".$paginator->sort($date,'slots')."</th>");
			}
?>
			</tr>
		
		<?php

		foreach($activities as $activity) {	
			isset($activity['Schedule']['slots']['18/03']) ? $slot[0]=$activity['Schedule']['slots']['18/03'] : $slot[0]="";
			isset($activity['Schedule']['slots']['19/03']) ? $slot[1]=$activity['Schedule']['slots']['19/03'] : $slot[1]="";
			isset($activity['Schedule']['slots']['20/03']) ? $slot[2]=$activity['Schedule']['slots']['20/03'] : $slot[2]="";
			echo $html->tableCells(
				array(
					array(
		           		$html->link($activity['Activity']['short_name'],array('controller' => 'activitymanagers', 'action' => 'view', $activity['Activity']['id']), null, false),
		           		$html->link($activity['Contenttype']['name'],array('controller' => 'contenttypes', 'action' => 'view', $activity['Activity']['contenttype_id']), null, false),
		           		$slot[0],
		           		$slot[1],
		           		$slot[2],
				        )
			      )
		    );
		}

		?>
		</table>
	<?php echo $html->div(null,$paginator->prev().' '.$paginator->numbers().' '.$paginator->next()); ?>
	</div>
</div>







