<p><a href="<?php echo $html->url('/secret_recipes/index'); ?>">Secret Recipes</a> &rarr; </p>

<h1><?php echo $article['SecretRecipe']['title']; ?></h1>
<p><?php echo date( "l, F j, Y", strtotime($article['SecretRecipe']['date'])); ?> 
<a href="/articles/view/<?php echo $article['SecretRecipe']['id']; ?>/">permalink</a></p>

<p><?php echo nl2br( $article['SecretRecipe']['content'] ); ?></p>


</div><!-- END featured_container //--> 
