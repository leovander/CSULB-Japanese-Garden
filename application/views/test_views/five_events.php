<?php
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 4/28/14
 * Time: 10:52 AM
 */
?>

<section id="events-index" class="content">
    <?php foreach($events as $event): ?>
        <article class="summary-article">
            <figure class="summary-figure">
            <img src="<? echo $event['photo'] ?>" class="summary-img" />
            </figure>
            <div class="summary-art-content">
            <h1>
                <?php echo $event['title'] ?>
            </h1>
            <p>
                <?php echo date_format($event['start'],'l F jS g:i A') . ' - ' . date_format($event['end'], 'g:i A')?>
            </p>
            <p>
                <?php echo nl2br($event['description']) ?> <a href="#">Read more . . .</a>
            </p>
            </div>
        </article>
    <?php endforeach; ?>

</section>