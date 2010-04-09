<h3>Unpublished Articles</h3>
<p><a href="<?php echo $html->url('/articles/index'); ?>">Switch to Live Articles</a></p>

<?php foreach( $articles as $item ): ?>
    <div style="margin: 0 0 10px 0;">
    <?php if( isset( $item['Article']['imagefile'] ) ): ?>
		<div style="margin: 5px; float: right;">
		<a href="/articles/view/<?php echo $item['Article']['id']; ?>/"><img 
			alt="thumbnail illustration" src="<?php echo $item['Article']['imagefile']; ?>" width="100px" /></a>
		</div>
    <?php endif; ?>

    <h3><i><?php echo $item['PublishState']['name']; ?></i> <a href="/articles/view/<?php echo $item['Article']['id']; ?>/"><?php echo $item['Article']['title']; ?></a></h3>
    <p><?php echo date( "l, F j, Y", strtotime($item['Article']['date'])); ?>
	<?php if( $item['Article']['summary'] ): ?>
	&mdash; <?php echo $item['Article']['summary']; ?> <a href="/articles/view/<?php echo $item['Article']['id']; ?>/">read more</a></p>
	<?php endif; ?>
    </div>
	<div style="clear: both;"></div>
<?php endforeach; ?>
