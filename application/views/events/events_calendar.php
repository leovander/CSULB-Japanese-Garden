<?php
/**
 * Context:      Event Calendar page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Beau Squires
 * Date:         2014/4/21
 */
?>

<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js" type="text/javascript"></script>
<script src="<? echo site_url('assets/js/calendar.js')?>" type="text/javascript"></script>

<section class="no-sidenav" id="calendar-wrapper">
    <h1>Events Calendar</h1>
<!--    Full Calendar provided by jQuery calendar plugin-->
    <div id="calendar"></div>

<!--   Mobile Listing of Events  -->
    <div id="mobile-calendar">
        <table>
            <caption>Event Calendar Listing</caption>
            <thead>
            <tr>
                <th>Date</th>
                <th>Event</th>
            </tr>
            </thead>
            <?php foreach ($events as $event): ?>
                <?php $start = date_create($event['start']);?>
                <tr>
                    <td><?php echo date_format($start, 'l F jS') ?></td>
                    <td><?php echo $event['title'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<!--    Calendar Items listed in a table in the event that javascript is not enabled-->
    <noscript>
        <table>
            <caption>Event Calendar Listing</caption>
            <thead>
            <tr>
                <th>Date</th>
                <th>Event</th>
            </tr>
            </thead>
            <?php foreach ($events as $event): ?>
                <?php $start = date_create($event['start']);?>
                <tr>
                    <td><?php echo date_format($start, 'l F jS') ?></td>
                    <td><?php echo $event['title'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </noscript>
</section>