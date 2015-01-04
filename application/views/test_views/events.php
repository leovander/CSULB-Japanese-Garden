<?php
/**
 * Created by Kun Wei
 *  Date: 2014/4/3
 */
?>

<section id="events-index" class="content">
    <?php foreach($events as $event): ?>
       <?php
        $start = date_create($event['start']);
        $end = date_create($event['end']);

        ?>
    <article>
        <h1>
            <?php echo $event['title'] ?>
        </h1>
        <p>
            <?php echo date_format($start,'l F jS g:i A') . ' - ' . date_format($end, 'g:i A')?>
        </p>
        <p>
            <?php echo nl2br($event['description']) ?>
        </p>
    </article>
    <?php endforeach; ?>

</section>