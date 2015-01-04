<?php
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 4/9/14
 * Time: 4:58 PM
 */ ?>
<!--<div id="calendar"></div>-->
<h1>No script</h1>
<noscript>
    <table>
    <?php foreach ($events as $event): ?>
        <?print_r($event);?>
    <?php endforeach; ?>
    </table>
</noscript>

<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css"/>
<script src="<? echo site_url('assets/js/calendar.js')?>" type="text/javascript"></script>