<?php
/**
 * Created by Gyngai Ung
 *  Date: 2014/3/20
 *  Time: 3:52pm
 */
?>
    <section id="home">
        <?php $this->load->helper('url'); ?>
        <div id="left-tiles">
            <a href="<?php echo(site_url('index.php/garden/')); ?>">
                <div id="garden">
                        <img src="<?php echo site_url('assets/images/garden_index.jpg'); ?>" alt="Japanese Garden"/>
                        <p class="simple-caption">Garden<span>Take a Photo Tour, Check out what we have &amp; Plan a trip!</span></p>
                </div>
            </a>
            <a href="<?php echo(site_url('index.php/membership/')); ?>">
                <div id="membership">
                        <img src="<?php echo site_url('assets/images/membership_home.jpg'); ?>" alt="Membership"/>
                        <p class="simple-caption">Membership<span>Become a member today or volunteer at the Garden</span></p>
                </div>
            </a>
        </div>

        <div id="right-tiles">
            <a href="<?php echo(site_url('index.php/weddings/')); ?>">
                <div id="weddings">
                        <img src="<?php echo site_url('assets/images/wedding_home.jpg'); ?> " alt="Wedding"/>
                        <p class="simple-caption">Wedding<span>Plan your wedding or any special event at the Garden</span></p>
                </div>
            </a>

            <a href="<?php echo(site_url('index.php/events/')); ?>">
                <div id="events">
                        <img src="<?php echo site_url('assets/images/event_index.jpg'); ?>" alt="Events"/>
                        <p class="simple-caption">Events<span>Come join us!</span></p>
                </div>
            </a>

            <a href="<?php echo(site_url('index.php/education/')); ?>">
                <div id="education">
                        <img src="<?php echo site_url('assets/images/education_home.jpg'); ?>" alt="Education" style=""/>
                         <p class="simple-caption">Education<span>Learn with us!</span></p>
                </div>
            </a>
         </div>
    </section>