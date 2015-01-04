<?php
/**
 * Created by PhpStorm.
 * User: itorres
 * Date: 5/14/14
 * Time: 6:13 PM
 */
?>
<section class="small-sidenav" id="gallery">
    <section class="left-panel-image">
        <figure>
            <img src="<?php echo site_url('assets/images/wedding_galleries/ambrosia_event_services/left-panel.jpg');?>" alt="Wedding Photo of couple at Japanese Garden"/>
        </figure>
    </section>
    <section class="right-panel">
        <h1>Ambrosia Photo Gallery</h1>
        <div id="slides1">
            <?php
                for($i = 1; $i < 28; $i++) {
                    ?>
                    <img src="<?php echo site_url('assets/images/wedding_galleries/ambrosia_event_services/'.$i.'.jpg'); ?>" alt="Wedding Photo taken at Japanese Garden" />
                    <?php
                }
            ?>
        </div>
    </section>
    <script src="<? echo site_url('assets/js/slides.js')?>" type="text/javascript"></script>
    <script src="<? echo site_url('assets/js/gallery.js')?>" type="text/javascript"></script>