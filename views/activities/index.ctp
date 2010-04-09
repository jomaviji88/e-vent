<h4>Actividades</h4>

<?php foreach( $activities as $item ): ?>
    <h3><a href="/articles/view/<?php echo $item['Article']['id']; ?>/"><?php echo h($item['Article']['title']); ?></a></h3>
    <p><?php echo date( "l, F j, Y", strtotime($item['Article']['date'])); ?></p>
<?php endforeach; ?>



