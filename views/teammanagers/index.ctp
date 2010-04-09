<!-- File: users/index.ctp -->

<div id="solocolumn">
	<div id="page_header"><h1><?php __('Lista de Equipos');?></h1></div>
	<div id="primary">
		<table>
			<tr id="usersSorting">
				<th class="name"><?php echo $paginator->sort('L’der','name');?></th>
				<th class="name"><?php echo $paginator->sort('Nombre de Equipo','name');?></th>
			</tr>
		
		<?php

		foreach($teams as $team) {	
			echo $html->tableCells(
				array(
					array(      		
		           		$html->link($team['Team']['name'],array('controller' => 'teammanagers', 'action' => 'view', $team['Team']['id']), null, false),
		           		$html->link($team['User']['name'],array('controller' => 'usermanagers', 'action' => 'view', $team['User']['id']), null, false),
				        )
			      )
		    );
		}

		?>
		</table>
	<?php echo $html->div(null,$paginator->prev().' '.$paginator->numbers().' '.$paginator->next()); ?>
	</div>
</div>







