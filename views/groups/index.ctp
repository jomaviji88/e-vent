<div id="solocolumn">

<div id="page_header">User Groups</div>

<div id="primary">

<?php foreach( $groups as $group ): ?>

<p><a href="<?php echo $html->url('/gatekeeper/groups/view/'.$group['Group']['id'] ); ?>"><?php echo $group['Group']['name']; ?></a><br />
Parent: <?php if( isset( $group_index[$group['Group']['parent_id']] ) ): ?><?php echo $group_index[$group['Group']['parent_id']]; ?><?php endif; ?></p>

<?php endforeach; ?>
