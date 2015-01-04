<?php
/**
 * Context:      Contact Us page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Beau Squires
 * Author #2:    Gyngai Ung
 * Date:         3/22/14
 * Time:         1:50 PM
 */
?>

<section class="small-sidenav">
    <section class="left-panel-image">
        <figure>
            <img src="<?php echo site_url('assets/images/elaine-plesser-japanese-garden-koi-pond.jpg'); ?>"
                 alt="Scenery picture of the Japanese Garden with coypond in foreground"/>
        </figure>
        <figure id="donate-icon">
            <a href="https://giveto.csulb.edu/?fund=JPG" target="_blank">
                <img src="<?php echo site_url('assets/images/icon_180_givenow.gif'); ?>"
                     alt="Give: Make a Gift to the Earl Burns Miller Japanese Garden NOW"/>
            </a>
        </figure>
    </section>

    <section class="right-panel">
        <h1>Contact Us</h1>
        <h2>Rent the Garden</h2>
        <p>
            For information regarding weddings, receptions, luncheons, teas, rehearsal dinners, bridal & baby showers,
            dinner for two special, memorial services, photo sessions
            or other events; please email the office at
            <a href="mailto:jgcoordinators@csulb.edu">jgcoordinators@csulb.edu</a> or call
            <a href="tel:5629858889">(562) 985-8889</a>. Rental office open during Winter Recess Garden closure.
        </p>

        <h2>Education Department:</h2>
        <p>
            To reserve tours and for information regarding public education events, please search
            Garden Events, Book a Tour or Field Trips,
            Take a Photo Tour or call <a href="tel:5629858420">(562) 985-8420</a>.
        </p>

        <h2>Membership Services</h2>
        <p>
            For member benefits and services, please call the <a href="<?php echo site_url('index.php/membership');?>">membership</a> office
            at <a href="tel:5629852169">(562) 985-2169</a>.
        </p>

        <h2>Mailing Address:</h2>
        <?php /*based on: http://html5doctor.com/microformats/#hcard-org */?>
        <p class="vcard">
            <span class="adr">
            <span class="attn">EBM Japanese Garden</span><br />
            <span class="org">California State University Long Beach</span><br />
            <span class="street-address">1250 Bellflower Boulevard BAC Room-203,</span><br />
            <span class="locality">Long Beach</span>,
            <span class="region">CA</span>
            <span class="postal-code">90840</span><br />
            </span>
        </p>

        <h2>Facebook</h2>
        <p><a href="http://www.facebook.com/pages/Earl-Burns-Miller-Japanese-Garden-CSULB/126360670715626">Become our Fan on Facebook!</a></p>
        <p>Do you have a question for Japanese Garden?</p>
        <p>We are happy to answer any questions regarding the Earl Burns Miller Japanese Garden.</p>
        <p>Please use the form below to send a message to Earl Burns Miller Japanese Garden at CSULB.</p>

        <h2>Do you have a question for Japanese Garden?</h2>
        <p>We are happy to answer any questions regarding the Earl Burns Miller Japanese Garden.</p>
        <p>Please use the form below to send a message to Earl Burns Miller Japanese Garden at CSULB. </p>
        <p>All the fields are required.</p>

        <?php
            if (function_exists('validation_errors')) //form_validation
                {echo validation_errors();}
            if ($this->session->flashdata('success'))  {
        ?>
            <div class="success-message">Your form has been submitted. Thank you.</div>
        <?php
        }?>
        <?php $this->load->helper('form'); ?>
        <?php print (form_open('index.php/pages/contact_us', array('id' => 'validateform'))); ?>
            <fieldset class="profile">
                <ul>
                    <li class="left">
                        <label for="full_name" class="req">Full Name</label>
                        <input type="text" name="full_name" id="full_name" value="<?php echo set_value('full_name'); ?>" placeholder="John Smith" required="required"/>
                    </li>
                    <li class="right">
                        <label for="email" class="req">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="John.Smith@example.com" required="required"/>
                    </li>
                    <li class="whole">
                        <label for="subject" class="req">Subject</label>
                        <input type="text" name="subject" id="subject" value="<?php echo set_value('subject'); ?>" placeholder="Message Subject" required="required"/>
                    </li>
                    <li class="whole">
                        <label for="comment" class="req">Message</label>
                        <textarea name="comment" id="comment" cols="45" rows="5" required="required"><?php  if (isset($_POST['comment'])) {echo $_POST['comment'];}?></textarea>
                    </li>
                </ul>
            </fieldset>

            <fieldset id="submit">
                <input type="submit" name="submit" class="submit" value="Submit"/>
                <input type="reset" name="clear" class="clear" value="Clear"/>
            </fieldset>

        </form>

    </section>

<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
<script src="<? echo site_url('assets/js/form-validate.js')?>" type="text/javascript"></script>