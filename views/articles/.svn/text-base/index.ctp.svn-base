<h4>Kitchen News</h4>
<?php if( $current_page != 1): ?>
<p style="text-align: center;"><?php echo $page_size; ?> results per page: 
<?php for( $i = 0; $i <= (round($story_count/$page_size) ); $i++ ): ?>
    <?php if( ($i+1) == $current_page): ?>
	    <b><?php echo $i+1; ?></b>&nbsp;
    <?php else: ?>
	    <a href="<?php echo $html->url('/articles/index?page='.($i+1)); ?>"><?php echo $i+1; ?></a>&nbsp;
    <?php endif; ?>
<?php endfor; ?>
(<?php echo $story_count; ?> total stories )
</p>
<?php endif; ?>

<?php foreach( $articles as $item ): ?>
    <div style="margin: 0 0 10px 0;">
    <h3><a href="/articles/view/<?php echo $item['Article']['id']; ?>/"><?php echo h($item['Article']['title']); ?></a></h3>
    <p><?php echo date( "l, F j, Y", strtotime($item['Article']['date'])); ?>
	</div>
	<div style="clear: both;"></div>
<?php endforeach; ?>

<p style="text-align: center;"><?php echo $page_size; ?> results per page: 
<?php for( $i = 0; $i <= (round($story_count/$page_size) ); $i++ ): ?>
    <?php if( ($i+1) == $current_page): ?>
	    <b><?php echo $i+1; ?></b>&nbsp;
    <?php else: ?>
	    <a href="<?php echo $html->url('/articles/index?page='.($i+1)); ?>"><?php echo $i+1; ?></a>&nbsp;
    <?php endif; ?>
<?php endfor; ?>
(<?php echo $story_count; ?> total stories )
</p>



