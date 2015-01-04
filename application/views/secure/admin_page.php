<?php
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 3/31/14
 * Time: 1:00 PM
 */
?>
<!--Inline style here to prevent page flicker when loading. Did not work in Stylesheet-->
<section class="no-sidenav">
    <h1>Welcome <?php echo $username; ?>!</h1>
    <span id="logout"><a href="<?php echo site_url('index.php/admin_logout') ?>">Logout</a></span>
    <div id="tabs" style="display: none;">
        <ul>
            <li><a href="#calendar">Calendar</a></li>
            <li><a href="#photos">Photos</a></li>
            <li><a href="#hours">Hours</a></li>
            <li><a href="#volunteers">Volunteers</a></li>
            <li><a href="#contacts">Contacts</a></li>
            <li><a href="#ratings">Ratings</a></li>
        </ul>
        <section id="calendar">
            <div id="calendar"></div>

        </section>
        <section id="photos">
            <h2>Photos</h2>

            <form id="file_upload_form">
                <fieldset>
                    <label for="photo"><h2>Photo Upload</h2></label>
                    <input type="file" id="photo" name="photo"/>
                    <br/>
                    <input type="submit"/>
                </fieldset>
            </form>

            <section id="photos-viewport">
                <? foreach ($photos as $photo): ?>
                    <figure class="admin-display-imgs">
                        <button data-filename="<? echo $photo['name'] ?>" class="img-delete">Delete</button>
                        <img src="<? echo $photo['url'] ?>"/>

                        <div>
                            <input type="text" class="img-url" value="<? echo $photo['url'] ?>" readonly/>
                            <br/>
                            <input type="text" class="img-url" value="<? echo $photo['name'] ?>" readonly/>

                        </div>
                    </figure>
                <?php endforeach; ?>
            </section>
        </section>
        <section id="hours">
            <h2>Hour of Operation</h2>

            <form id="hours-of-operation">
                <fieldset class="left">
                    <legend>Weekdays</legend>
                    <span class="hours-open">Open</span><span class="hours-close">Close</span><span class="hours-closed">Closed</span>
                    <ul>
                        <li><h2>Monday</h2><input type="time" id="monday_open" name="monday_open"/>
                            <input type="time" id="monday_close" name="monday_close"/>
                            <input type="checkbox" id="monday_isclosed" name="monday_isclosed"/>
                        </li>
                        <li><h2>Tuesday</h2><input type="time" id="tuesday_open" name="tuesday_open"/>
                            <input type="time" id="tuesday_close" name="tuesday_close"/>
                            <input type="checkbox" id="tuesday_isclosed" name="tuesday_isclosed"/>
                        </li>
                        <li><h2>Wednesday</h2><input type="time" id="wednesday_open"
                                                     name="wednesday_open"/>
                            <input type="time" id="wednesday_close" name="wednesday_close"/>
                            <input type="checkbox" id="wednesday_isclosed" name="wednesday_isclosed"/></li>
                        <li><h2>Thursday</h2><input type="time" id="thursday_open"
                                                    name="thursday_open"/>
                            <input type="time" id="thursday_close" name="thursday_close"/>
                            <input type="checkbox" id="thursday_isclosed" name="thursday_isclosed"/></li>
                        <li><h2>Friday</h2><input type="time" id="friday_open" name="friday_open"/>
                            <input type="time" id="friday_close" name="friday_close"/>
                            <input type="checkbox" id="friday_isclosed" name="friday_isclosed"/></li>
                    </ul>

                </fieldset>
                <ul>
                    <fieldset class="right">
                        <span class="hours-open">Open</span><span class="hours-close">Close</span><span class="hours-closed">Closed</span>
                        <legend>Weekend</legend>
                        <li><h2>Saturday</h2><input type="time" id="saturday_open"
                                                    name="saturday_open"/>
                            <input type="time" id="saturday_close" name="saturday_close"/>
                            <input type="checkbox" id="saturday_isclosed" name="saturday_isclosed"/>
                        </li>
                        <li><h2>Sunday</h2><input type="time" id="sunday_open" name="sunday_open"/>
                            <input type="time" id="sunday_close" name="sunday_close"/>
                            <input type="checkbox" id="sunday_isclosed" name="sunday_isclosed"/></li>
                </ul>
                </fieldset>
                <input type="submit" id="hours-submit"/>
            </form>
        </section>
        <section id="volunteers">
            <h2>Volunteers</h2>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($volunteers AS $volunteer) {
                    ?>
                        <tr>
                            <td><?php print(ucwords($volunteer['firstname'].' '.$volunteer['lastname'])); ?></td>
                            <td><?php print(ucwords($volunteer['city'])); ?></td>
                            <td><?php print(ucwords($volunteer['state'])); ?></td>
                            <td><?php print($volunteer['email']); ?></td>
                            <td><?php print($volunteer['volunteertype']); ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <?php //print_r($volunteers); ?>
        </section>
        <section id="contacts">
            <h2>Contacts</h2>
            <?php //print_r($contacts); ?>
            <table>
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Comment</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($contacts AS $contact) {
                    ?>
                    <tr>
                        <td><?php print(ucwords($contact['full_name'])); ?></td>
                        <td><?php print($contact['email']); ?></td>
                        <td><?php print(ucwords($contact['subject'])); ?></td>
                        <td><?php print($contact['comment']); ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </section>
        <section id="ratings">
            <h2>Ratings</h2>
            <table>
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Comment</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($ratings AS $rating) {
                    ?>
                    <tr>
                        <td><?php print(ucwords($rating['full_name'])); ?></td>
                        <td><?php print($rating['email']); ?></td>
                        <td><?php print(ucwords($rating['site_rating'])); ?></td>
                        <td><?php print($rating['comment']); ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </section>
    </div>
    <div id="#overlay"></div>
</section>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css"/>
<link rel="stylesheet" href="<?php echo site_url('assets/css/admin-style.css') ?>"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<script src="<? echo site_url('assets/js/form.js') ?>" type="text/javascript"></script>
<script src="<? echo site_url('assets/js/admin.js') ?>" type="text/javascript"></script>
