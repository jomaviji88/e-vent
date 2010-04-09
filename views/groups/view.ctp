<div id="solocolumn">

<div id="page_header">
<h2>User Group: <?php echo $group['name']; ?></h2>
</div>

<div id="primary">
<?php $lastNode = count( $node_path ) - 1; ?>

<?php for( $i = $lastNode; $i >= 0; $i-- ): ?>
	<p>
	<?php for( $z = ($lastNode - $i); $z > 0; $z-- ): ?>
	    <?php echo "&rarr;" ?>
	<?php endfor; ?>
    <a href="<?php echo $html->url('/gatekeeper/groups/view/'.$node_path[$i]['Aro']['foreign_key']); ?>"><?php echo $node_path[$i]['Aro']['alias']; ?></a></p>
<?php endfor; ?>
</div><!-- END primary //-->
</div><!-- END solocolumn //-->
