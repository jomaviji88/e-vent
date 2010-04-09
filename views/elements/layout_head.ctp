<a href="<?php echo $html->url('/'); ?>" title="Congreso Internacional de Sistemas Computacionales"><img src="<?php echo $html->url('/img/header.png'); ?>"
width="692" height="111" alt="Congreso Internacional de Sistemas Computacionales" /></a>

<div class="menu">
[<a href="<?php echo $html->url('/'); ?>">Inicio</a>]
<?php foreach($kitchen_menu as $link): ?>
    [<a href="<?php echo $html->url($link['url']); ?>"><?php echo $link['label']; ?></a>]
<?php endforeach; ?>
</div>
