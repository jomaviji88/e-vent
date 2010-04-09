<p><a href="<?php echo $referer; ?>">Article List</a> &rarr; </p>

<h1><?php echo $article['Article']['title']; ?></h1>
<p><?php echo date( "l, F j, Y", strtotime($article['Article']['date'])); ?> <a href="/articles/view/<?php echo $article['Article']['id']; ?>/">permalink</a></p>

<p><?php echo nl2br( $article['Article']['content'] ); ?></p>

</div><!-- END featured_container //--> 
