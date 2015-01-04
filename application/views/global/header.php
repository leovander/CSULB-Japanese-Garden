<?php
/* Context:      Contact Us page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai ung
 * Date:         2014/3/20
 * Time:         3:52pm
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php if(isset($title)) {print($title.' - ');}; ?>Earl Burns Miller Japanese Garden at CSULB</title>
    <?php //site_url delivers the root of the site for easy access to the asset folders?>
    <link rel="Shortcut Icon" href="<?php echo site_url('assets/images/logo.ico') ?>" type="image/x-icon"/>
    <link rel="stylesheet" href="<?php echo site_url('assets/css/reset.css') ?>"/>
    <?php
    if($this->uri->segment(2) === 'photo_tour' || $this->uri->segment(2) === 'video_tour') { ?>
        <link rel="stylesheet" href="<? echo site_url('assets/css/photo-video-tour.css') ?>"/>
    <?php } ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.0/css/jquery.dataTables.css"/>
    <?php
    if($this->uri->segment(2) === 'become_a_member') { ?>
        <link rel="stylesheet" href="<?php echo site_url('assets/css/print.css') ?>" type="text/css" media="print"/>
    <?php } ?>
    <?php
    if($this->uri->segment(2) === 'events_calendar') { ?>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css"/>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css"/>
    <?php } ?>
    <link rel="stylesheet" href="<? echo site_url('assets/css/gallery.css') ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/css/styles.css') ?>"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto%7CLusitana%7COpen+Sans:400italic,600italic,700italic,800italic,400,600,700,800' rel='stylesheet' type='text/css'/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<header>
    <p id="student-project"><a href="<?php echo site_url('/index.php/credits/') ?>">CECS470 Web Accessibility - Student Project</a></p>
    <section id="logo">
        <a href="<?php echo(site_url(''));  ?> ">
            <img src="<?php echo site_url('assets/images/EBMJG_CSULB_logo.jpg'); ?>" alt="EBM Japanese Garden Logo"/>
            <span>Earl Burns Miller Japanese Garden</span>
        </a>
    </section>
</header>