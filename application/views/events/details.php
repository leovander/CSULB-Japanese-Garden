<?php
/**
 * Context:      Event index page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Beau Squires
 * Date:         4/29/14
 * Time:         11:54 AM
 */
?>

<section class="small-sidenav" id="event-detail">
    <section class="left-panel-image">
        <figure>
            <img src="<? echo $event['photo'] ?>" alt="Event photo"/>
        </figure>
    </section>

    <section class="right-panel" id="event-detail">
        <h1><?php echo $event['title'] ?></h1>
        <span id="event-date"><?php echo date_format($event['start'], 'l F jS') ?></span>
        <span id="event-time"><?php echo date_format($event['start'], 'g:i A') ?> -
            <?php echo date_format($event['end'], 'g:i A') ?>
        </span>

        <p id="event-details-description">
            <?php echo nl2br($event['description']) ?>
        </p>

        <ul id="nav">
            <li><a href="<?php echo site_url('index.php/events') ?>">Upcoming Events</a></li>
            <li><a href="<?php echo site_url('index.php/events/events_calendar') ?>">Calendar</a></li>
        </ul>
    </section>
</section>
