<?php
/**
 * Context:      Rate our website page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei* User: ny
 * Author #1:    Gyngai Ung
 * Date:         5/7/14
 * Time:         12:23 AM
 */
?>

<section class="small-sidenav">
    <section class="left-panel-image">
        <figure>
            <img src="<?php echo site_url('assets/images/rate_our_website_index.jpg');?>" alt="View of the Japanese Garden pond and tree"/>
        </figure>
    </section>

    <section class="right-panel">
        <h1>Rate Our Website</h1>

        <?php
            if (function_exists('validation_errors')) //form_validation
                {echo validation_errors();}
            if ($this->session->flashdata('success'))  {
        ?>
            <div class="success-message">Your form has been submitted. Thank you.</div>
        <?php
        }?>
        <?php $this->load->helper('form'); ?>
        <?php print (form_open('index.php/pages/rate_our_website', array('id' => 'validateform'))); ?>
            <p>Red asterisk (<span class="asterisk">*</span>) indicates required fields.</p>

            <fieldset class="profile">
                <legend>A little bit about yourself</legend>
                <ul>
                    <li class="left">
                        <label for="full_name" class="req">Full Name</label>
                        <input type="text" name="full_name" id="full_name" placeholder="John Smith" value="<?php echo set_value('full_name'); ?>" required="required"/>
                    </li>

                    <li class="right">
                        <label for="email" class="req">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="John.Smith@example.com" value="<?php echo set_value('email'); ?>" required="required"/>
                    </li>
                </ul>
            </fieldset>

            <fieldset id="siterating">
                <legend>Please rate our site</legend>

                <ul>
                    <li>
                        <input type="radio" name="site_rating" id="excellent" value="excellent" <?=set_radio('site_rating','excellent') ?>/>
                        <label for="excellent">Excellent</label>
                    </li>
                    <li>
                        <input type="radio" name="site_rating" id="poor" value="poor" <?=set_radio('site_rating','poor') ?>/>
                        <label for="poor">Poor</label>
                    </li>
                    <li>
                        <input type="radio" name="site_rating" id="doesthejob" value="does the job" <?=set_radio('site_rating','does the job') ?>/>
                        <label for="doesthejob">Does the job</label>
                    </li>
                    <li>
                        <input type="radio" name="site_rating" id="improvement" value="needs improvement" <?=set_radio('site_rating','needs improvement') ?>/>
                        <label for="improvement">Needs improvement</label>
                    </li>

                    <li>
                        <label for="comment">Please tell us your opinions, ideas and comments:</label>
                        <textarea name="comment" id="comment" cols="45" rows="5"><?php  if (isset($_POST['comment'])) {echo $_POST['comment'];}?></textarea>
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