<h2>Secret Recipes</h2>

<p>For authorized users only!</p>

<?php if( $current_page != 1): ?>
<p style="text-align: center;"><?php echo $page_size; ?> results per page: 
<?php for( $i = 0; $i <= (round($story_count/$page_size) ); $i++ ): ?>
    <?php if( ($i+1) == $current_page): ?>
	    <b><?php echo $i+1; ?></b>&nbsp;
    <?php else: ?>
	    <a href="<?php echo $html->url('/secret_recipes/index?page='.($i+1)); ?>"><?php echo $i+1; ?></a>&nbsp;
    <?php endif; ?>
<?php endfor; ?>
(<?php echo $story_count; ?> total stories )
</p>
<?php endif; ?>

<?php foreach( $articles as $item ): ?>
    <div style="margin: 0 0 10px 0;">
    
    <h3><a href="/secret_recipes/view/<?php echo $item['SecretRecipe']['id']; ?>/"><?php echo $item['SecretRecipe']['title']; ?></a></h3>
    <p><?php echo date( "l, F j, Y", strtotime($item['SecretRecipe']['date'])); ?>
    </div>
	<div style="clear: both;"></div>
<?php endforeach; ?>

<p style="text-align: center;"><?php echo $page_size; ?> results per page: 
<?php for( $i = 0; $i <= (round($story_count/$page_size) ); $i++ ): ?>
    <?php if( ($i+1) == $current_page): ?>
	    <b><?php echo $i+1; ?></b>&nbsp;
    <?php else: ?>
	    <a href="<?php echo $html->url('/secret_recipes/index?page='.($i+1)); ?>"><?php echo $i+1; ?></a>&nbsp;
    <?php endif; ?>
<?php endfor; ?>
(<?php echo $story_count; ?> total stories )
</p>



