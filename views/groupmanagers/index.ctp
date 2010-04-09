<!-- File: users/index.ctp -->

<?php

/*
for($i = 4; $i < 37; $i++) {
	echo  "UPDATE users SET group_id=2 WHERE id=$i;";
}
*/

?>

<div id="solocolumn">
	<div id="page_header"><h1><?php __('Lista de Equipos');?></h1></div>
	<div id="primary">
		<table>
			<tr id="usersSorting">
				<th class="name"><?php echo $paginator->sort('Nombre','name');?></th>
				<th class="name"><?php echo $paginator->sort('Hijo','name');?></th>
			</tr>
		
		<?php

		foreach($groups as $group) {	
			echo $html->tableCells(
				array(
					array(      		
		           		$html->link($group['Group']['name'],array('controller' => 'groupmanagers', 'action' => 'view', $group['Group']['id']), null, false),
		           		$html->link($group['Group']['parent_id'],array('controller' => 'usermanagers', 'action' => 'view', $group['Group']['id']), null, false),
				        )
			      )
		    );
		}

		?>
		</table>
	<?php echo $html->div(null,$paginator->prev().' '.$paginator->numbers().' '.$paginator->next()); ?>
	</div>
</div>







