<?php
/*
 * Context:      Volunteer form page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai Ung
 * Date:         3/22/14
 */
?>

<section class="small-sidenav">
    <section class="left-panel-image">
        <figure>
            <img src="<?php echo site_url('assets/images/volunteer_index.jpg');?>" alt="Walking path approaching the bridge inside the Japanese Garden"/>
        </figure>
    </section>

    <section class="right-panel">
        <h1>Japanese Garden Volunteer Application</h1>
        <?php
            if (function_exists('validation_errors')) //form_validation
                {echo validation_errors();}
            if ($this->session->flashdata('success'))  {
         ?>
            <div class="success-message">Your form has been submitted. Thank you.</div>
        <?php
        }?>
        <?php $this->load->helper('form'); ?>
        <?php print (form_open('index.php/pages/volunteer', array('id' => 'validateform'))); ?>
            <p>Red asterisk (<span class="asterisk">*</span>) indicates required fields.</p>
            <fieldset id="volunteer">
                <legend>Type of Volunteer: </legend>

                <div id="volunteerRadioGroup"> <!-- div for jQuery error label -->
                    <div class="radiogroup">
                        <input type="radio" name="volunteertype" id="gardening-vol" value="Gardening" required="required" <?=set_radio('volunteertype','Gardening') ?>/>
                        <label for="gardening-vol" class="req">Gardening Volunteer</label>
                    </div>

                    <div class="radiogroup">
                        <input type="radio" name="volunteertype" id="education-vol" value="Public Education Program" <?=set_radio('volunteertype','Public Education Program') ?>/>
                        <label for="education-vol" class="req">Public Education Program Volunteer</label>
                    </div>
                </div>

            </fieldset>

            <fieldset class="profile">
               <legend>Personal Information</legend>
                <ul>
                    <li class="left">
                        <label for="firstname" class="req">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="John" value="<?php echo set_value('firstname'); ?>" required="required"/>
                    </li>
                    <li class="right">
                        <label for="lastname" class="req">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Smith" value="<?php echo set_value('lastname'); ?>" required="required"/>
                    </li>
                    <li class="whole">
                        <label for="address" class="req">Street Address</label>
                        <input type="text" name="address" id="address" placeholder="123 Main Street" value="<?php echo set_value('address'); ?>" required="required"/>
                    </li>
                    <li class="left">
                        <label for="city" class="req">City</label>
                        <input type="text" name="city" id="city" placeholder="Long Beach" value="<?php echo set_value('city'); ?>" required="required"/>
                    </li>
                    <li class="right">
                        <label for="state" class="req">State</label>
                        <input type="text" list="state-list" name="state" id="state" placeholder="CA" value="<?php echo set_value('state'); ?>" required="required"/>
                        <datalist id="state-list">
                            <option label="AL" value="Alabama"></option>
                            <option label="AK" value="Alaska"></option>
                            <option label="AZ" value="Arizona"></option>
                            <option label="AR" value="Arkansas"></option>
                            <option label="CA" value="California"></option>
                            <option label="CO" value="Colorado"></option>
                            <option label="CT" value="Connecticut"></option>
                            <option label="DE" value="Delaware"></option>
                            <option label="FL" value="Florida"></option>
                            <option label="GA" value="Georgia"></option>
                            <option label="HI" value="Hawaii"></option>
                            <option label="ID" value="Idaho"></option>
                            <option label="IL" value="Illinois"></option>
                            <option label="IN" value="Indiana"></option>
                            <option label="IA" value="Iowa"></option>
                            <option label="KS" value="Kansas"></option>
                            <option label="KY" value="Kentucky"></option>
                            <option label="LA" value="Louisiana"></option>
                            <option label="ME" value="Maine"></option>
                            <option label="MD" value="Maryland"></option>
                            <option label="MA" value="Massachusetts"></option>
                            <option label="MI" value="Michigan"></option>
                            <option label="MN" value="Minnesota"></option>
                            <option label="MS" value="Mississippi"></option>
                            <option label="MO" value="Missouri"></option>
                            <option label="MT" value="Montana"></option>
                            <option label="NE" value="Nebraska"></option>
                            <option label="NV" value="Nevada"></option>
                            <option label="NH" value="New Hampshire"></option>
                            <option label="NJ" value="New Jersey"></option>
                            <option label="NM" value="New Mexico"></option>
                            <option label="NY" value="New York"></option>
                            <option label="NC" value="North Carolina"></option>
                            <option label="ND" value="North Dakota"></option>
                            <option label="OH" value="Ohio"></option>
                            <option label="OK" value="Oklahoma"></option>
                            <option label="OR" value="Oregon"></option>
                            <option label="PA" value="Pennsylvania"></option>
                            <option label="RI" value="Rhode Island"></option>
                            <option label="SC" value="South Carolina"></option>
                            <option label="SD" value="South Dakota"></option>
                            <option label="TN" value="Tennessee"></option>
                            <option label="TX" value="Texas"></option>
                            <option label="UT" value="Utah"></option>
                            <option label="VT" value="Vermont"></option>
                            <option label="VA" value="Virginia"></option>
                            <option label="WA" value="Washington"></option>
                            <option label="WV" value="West Virginia"></option>
                            <option label="WI" value="Wisconsin"></option>
                            <option label="WY" value="Wyoming"></option>
                        </datalist>
                    </li>
                    <li class="left">
                        <label for="zip" class="req">Zip</label>
                        <input type="text" name="zip" pattern="(\d{5}([\-]\d{4})?)" id="zip" placeholder="90000" value="<?php echo set_value('zip'); ?>" required="required"/>

                    </li>
                    <li class="left">
                        <label for="homephone">Home Phone</label>
                        <input type="tel" name="homephone" pattern="^(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}$" id="homephone" value="<?php echo set_value('homephone'); ?>" placeholder="562-123-4567"/>
                    </li>
                    <li class="right">
                        <label for="cellphone">Cell Phone</label>
                        <input type="tel" name="cellphone" pattern="^(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}$" id="cellphone" value="<?php echo set_value('cellphone'); ?>" placeholder="213-123-4567"/>
                    </li>
                    <li class="left">
                        <label for="email" class="req">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="John.Smith@example.com" value="<?php echo set_value('email'); ?>" required="required"/>
                    </li>
                    <li>
                        <label for="comment">Please tell us your opinion, idea, and comment:</label>
                        <textarea name="comment" id="comment" cols="45" rows="5"><?php  if (isset($_POST['comment'])) {echo $_POST['comment'];}?></textarea>

                    </li>
                </ul>
            </fieldset>

            <fieldset id="submit">
                <input type="submit" name="submit" class="submit" value="Submit"/>
                <input type="reset" name="clear" class="clear" value="Clear"/>
            </fieldset>
        <?php
        //print_r($_POST['comment']);
        //exit;
        ?>
        </form>

    </section>

<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
<script src="<? echo site_url('assets/js/form-validate.js')?>" type="text/javascript"></script>