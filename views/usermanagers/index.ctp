<!-- File: users/index.ctp -->

<div id="solocolumn">
	<div id="page_header"><h1><?php __('Lista de Usuarios');?></h1></div>
	<div id="primary">
		<table>
			<tr id="usersSorting">
				<th class="name"><?php echo $paginator->sort('username');?></th>
				<th class="name"><?php echo $paginator->sort('email');?></th>
				<th class="name"><?php echo $paginator->sort('Group','name');?></th>
			</tr>
		
		<?php
		foreach($users as $user)
		{	
			echo $html->tableCells(
				array(
					array(
		           		$html->link($user['User']['username'],array('controller' => 'usermanagers', 'action' => 'view', $user['User']['id']), null, false),
		           		$html->link($user['User']['email'],"mailto:".$user['User']['email'], null, false),
		           		$html->link($user['Group']['name'],array('controller' => 'groups', 'action' => 'view', $user['Group']['id']), null, false),
				        )
			      )
		    );
		}
		?>
		</table>
	<?php echo $html->div(null,$paginator->prev().' '.$paginator->numbers().' '.$paginator->next()); ?>
	</div>
</div>







