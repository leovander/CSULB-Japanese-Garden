<?php
/*
 * Context:      Become a Member page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai Ung
 * Date:         3/21/14
 */
?>

<section class="small-sidenav">
    <section class="left-panel-image">
        <figure>
            <img src="<?php echo site_url('assets/images/JGlantern_cover.jpg');?>" alt="Koi Coupon - Good for one handful of Koi Food"/>
            <figcaption>25th Anniversary Edition of <em>The Lantern</em></figcaption>
        </figure>
    </section>

    <section class="right-panel">

        <h1>Make the Japanese Garden your own... Join the Friends of the Japanese Garden Today!</h1>
        <h2>Members Enjoy The Following Benefits</h2>
        <p>Membership makes a great gift.  To order a gift membership, call <a href="tel:5629855930">(562) 985-5930</a></p>

        <dl>
            <dt>Membership benefits include:</dt>
            <dd>
                <ul>
                    <li>Free admission to <em>Garden Across America</em></li>
                    <li>Invitation to member-only events
                        <ul>
                            <li>Complimentary Tea and Tour for New Members</li>
                            <li>Special Lectures and Programs</li>
                        </ul>
                    </li>
                    <li>Discounts on Garden Programs</li>
                    <li>Subscription to The Lantern Newsletter</li>
                    <li>10% Discount on Garden merchandise</li>
                </ul>
            </dd>
        </dl>
        <p>
            Your membership in one of the following categories ensures support for the educational and cultural programs of the Japanese Garden.
        </p>

        <table class="responsive-table" id="benefits-table">
            <caption>Annual Membership Level</caption>
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Benefits</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Basic Affiliate</td>
                    <td>$40.00</td>
                    <td>Faculty, staff, students, or alumni up to 2 adults and children at the same residence</td>
                </tr>

                <tr>
                    <td>Basic</td>
                    <td>$50.00</td>
                    <td>Up to 2 adults and children at the same residence</td>
                </tr>

                <tr>
                    <td>Associate</td>
                    <td>$120.00</td>
                    <td>All of the above plus Garden Logo pin</td>
                </tr>

                <tr>
                    <td>Guardian</td>
                    <td>$300.00</td>
                    <td>All of the above plus invitations to university special events</td>
                </tr>

                <tr>
                    <td>Garden Fellow</td>
                    <td>$500.00</td>
                    <td>
                        <ul>
                            <li>All of the above plus invitation to dinner with the curator</li>
                            <li>Approximate benefit value: $50 <sup>[1]</sup></li>
                        </ul>
                    </td>

                </tr>

                <tr>
                    <td>Benefactor</td>
                    <td>$1000.00</td>
                    <td>
                        <ul>
                            <li>All of the above plus complimentary use of the garden for a private event</li>
                            <li>(some blackout days apply) Value of benefit determined at time of selection <sup>[1]</sup></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php $this->load->helper('form'); ?>

        <form id="validateform">
            <p>Red asterisk (<span class="asterisk">*</span>) indicates required fields.</p>
            <fieldset id="acceptance">
                <legend>Membership level selection:</legend>

                <label for="membershipLevel" class="req">Choose a membership level</label>
                <select id="membershipLevel" name="membershipLevel" required="required">
                    <option value="" >Membership level</option>
                    <option value="Basic Affiliate">Basic Affiliate</option>
                    <option value="Basic">Basic</option>
                    <option value="Associate">Associate</option>
                    <option value="Guardian">Guardian</option>
                    <option value="Garden Fellow">Garden Fellow</option>
                    <option value="Benefactor">Benefactor</option>
                </select>

                <div id="acceptRadioGroup"> <!-- div for jQuery error label -->
                    <input type="radio" name="accept" id="accepted" value="I accept membership level benefit" required="required"/>
                    <label for="accepted" class="req">I accept membership level benefit</label>

                    <p id="footnote"><sup>[1]</sup> if membership is accepted, the amount of the charitable contribution may be reduced by the value of the benefit.  Please consult your tax professional</p>

                    <input type="radio" name="accept" id="declined" value="I decline membership level benefit"/>
                    <label for="declined" class="req">I decline membership level benefit</label>
                </div>
            </fieldset>

            <fieldset class="profile">
                <legend>Personal Information</legend>
                <ul>
                    <li class="left">
                        <label for="firstname" class="req">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="John" required="required"/>
                    </li>
                    <li class="right">
                        <label for="lastname" class="req">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Smith" required="required"/>
                    </li>
                    <li class="whole">
                        <label for="address" class="req">Address</label>
                        <input type="text" name="address" id="address" placeholder="123 Main Street" required="required"/>
                    </li>
                    <li class="left">
                        <label for="city" class="req">City</label>
                        <input type="text" name="city" id="city" placeholder="Long Beach" required="required"/>
                    </li>
                    <li class="right">
                        <label for="state" class="req">State</label>
                        <input type="text" list="state-list" name="state" id="state" placeholder="CA" required="required"/>
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
                        <input type="text" name="zip" pattern="(\d{5}([\-]\d{4})?)" id="zip" placeholder="90000" required="required"/>
                    </li>
                    <li class="left">
                        <label for="homephone">Home Phone</label>
                        <input type="tel" name="homephone" pattern="^(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}$" id="homephone" placeholder="562-123-4567"/>
                    </li>
                    <li class="right">
                        <label for="cellphone">Cell Phone</label>
                        <input type="tel" name="cellphone" pattern="^(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}$" id="cellphone" placeholder="213-123-4567"/>
                    </li>
                    <li class="left">
                        <label for="email" class="req">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="John.Smith@example.com" required="required"/>
                    </li>
                    <li class="left">
                        <label for="biztitle">Business Title</label>
                        <input type="text" name="biztitle" id="biztitle" placeholder="Manager"/>
                    </li>
                    <li class="right">
                        <label for="employer">Employer</label>
                        <input type="text" name="employer" id="employer" placeholder="Example Company"/>
                    </li>
                    <li class="whole">
                        <label for="amt" class="req">Amount Enclosed</label>
                        <input type="number" step="0.01" name="amt" min="0" id="amt" placeholder="####.##" required="required"/>
                    </li>
                </ul>
            </fieldset>

            <fieldset id="payment">
                <legend>Payment Information</legend>
                <ul>
                    <li class="whole">
                        <label for="nameOnCard" class="req">Name On Card</label>
                        <input type="text" id="nameOnCard" name="nameOnCard" placeholder="John Smith" required="required"/>
                    </li>

                    <li class="whole" id="credit">
                        <div id="cardRadioGroup"> <!-- div for jQuery error label -->
                            <div class="radiogroup">
                                <input type="radio" name="cardtype" id="visa" value="visa" required="required"/>
                                <label for="visa" class="req">Visa</label>
                            </div>

                            <div class="radiogroup">
                                <input type="radio" name="cardtype" id="master" value="master" required="required"/>
                                <label for="master" class="req">MasterCard</label>
                            </div>

                            <div class="radiogroup">
                                <input type="radio" name="cardtype" id="amex" value="amex" required="required"/>
                                <label for="amex" class="req">AmEx</label>
                            </div>
                        </div>
                    </li>

                    <li class="whole">
                        <label for="cardNum" class="req">Card Number</label>
                        <input type="text" id="cardNum" name="cardNum" pattern="[0-9]{13,16}" required="required"/>
                    </li>

                    <li class="whole">
                        <label for="signature">Signature</label>
                        <input type="text" name="signature" id="signature" disabled="disabled"/>
                    </li>
                </ul>
            </fieldset>

            <fieldset>
                <legend>Make Check payable to: EBM Japanese Garden, CSULB</legend>

                <p>Please mail to:</p>
                <?php /*based on: http://html5doctor.com/microformats/#hcard-org */?>
                <p class="vcard">
                    <span class="adr">
                    <span class="attn">EBM Japanese Garden</span><br />
                    <span class="org">CSULB</span><br />
                    <span class="street-address">6300 State University drive, Suite 306</span><br />
                    <span class="locality">Long Beach</span>,
                    <span class="region">CA</span>
                    <span class="postal-code">90815</span><br />
                    <span class="tel">Tel: <span class="value">(562) 985-8889</span></span>
                    </span>
                </p>
            </fieldset>

            <fieldset id="submit">
                <legend>
                    This form is provided for your convenience for printing purpose only.  <br />
                    None of the information is stored.
                </legend>
                <input type="submit" name="submit" class="submit" id="print" value="Print Form"/>
                <input type="reset" name="clear" class="clear" value="Clear"/>
            </fieldset>

        </form>
    </section>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
<script src="<? echo site_url('assets/js/form-validate.js')?>" type="text/javascript"></script>