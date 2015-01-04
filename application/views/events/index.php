<?php
/**
 * Context:      Event Index page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Beau Squires
 * Date:         4/28/14
 * Time:         10:52 AM
 */
?>
    <?php if(isset($events) && !empty($events)) { ?>
        <section class="no-sidenav">
            <div class="image-and-content">
                <h1>Garden events</h1>
            </div>
            <?php foreach ($events as $event): ?>
                <article class="image-and-content">
                    <figure>
                        <img src="<? echo $event['photo']; ?>" alt="Drawing of Japanese style gate used as place holder" />
                    </figure>
                    <section>
                        <h2><?php echo $event['title'] ?></h2>
                        <span id="events-date-time-wrapper">
                            <span id="event-date"><?php echo date_format($event['start'], 'l F jS') ?></span>
                            <span id="event-time"><?php echo date_format($event['start'], 'g:i A') ?> -
                                <?php echo date_format($event['end'], 'g:i A') ?>
                            </span>
                        </span>
                        <p>
                            <?php echo nl2br($event['description']) ?> <a href="<? echo site_url('index.php/events/details/' . $event['id']) ?>">Read more...</a>
                        </p>
                    </section>
                </article>
            <?php endforeach; ?>
        </section>
    <?php } else {
        ?>
        <section class="large-sidenav">
            <section class="left-panel-image">
                <figure>
                    <img src="<?php echo site_url('assets/images/no_events.jpg');?>" alt="An event by the side of the pond" />
                </figure>
            </section>
            <section class="right-panel">
                <h1>Garden events</h1>
                <p>There are no upcoming events at this moment.</p>
                <p>Please come back soon.</p>
                <div class="left-panel-links">
                    <p>Things that may interest you:</p>
                    <ul>
                        <li><a href="<?php print(base_url('index.php/events/other_special_events')); ?>">host your own event</a></li>
                        <li><a href="<?php print(base_url('index.php/about/contact_us')); ?>">get in touch</a></li>
                        <li><a href="<?php print(base_url('index.php/garden/photo_tour')); ?>">take a photo tour</a></li>
                    </ul>
                </div>
            </section>
        </section>
        <?php
    }?>