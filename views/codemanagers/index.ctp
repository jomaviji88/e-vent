<!-- File: users/index.ctp -->

<?php

?>

<div id="solocolumn">
	<div id="page_header"><h1><?php __('Lista de Equipos');?></h1></div>
	<div id="primary">
		<table>
			<tr id="usersSorting">
				<th class="name"><?php echo $paginator->sort('code','C—digo');?></th>
				<th class="name"><?php echo $paginator->sort('Nombre de Cup—n','name');?></th>
				<th class="name"><?php echo $paginator->sort('Nombre de Cup—n','name');?></th>
			</tr>
		
		<?php

		foreach($codes as $code) {	
			echo $html->tableCells(
				array(
					array( 
						$html->link($code['Code']['code'],array('controller' => 'codemanagers', 'action' => 'view', $code['Code']['id']), null, false),
						$html->link($code['Coupon']['name'],array('controller' => 'codemanagers', 'action' => 'view', $code['Code']['id']), null, false),     		
						$html->link($code['User']['name'],array('controller' => 'codemanagers', 'action' => 'view', $code['Code']['id']), null, false),     		
		           		$html->link($code['Code']['discount'],array('controller' => 'codemanagers', 'action' => 'view', $code['Code']['id']), null, false),
				        )
			      )
		    );
		}

		?>
		</table>
	<?php echo $html->div(null,$paginator->prev().' '.$paginator->numbers().' '.$paginator->next()); ?>
	</div>
</div>







