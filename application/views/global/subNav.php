<?php
/*
 * Context:      sub navigation page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai Ung
 * Author #2:    Israel Torres
 * Date/Time:    4/29/14 9:12pm
 */
?>

<aside class="navigation">
    <ul>
    <?php

    $active = $this->uri->segment(2);
    $i = 1;
    $size = count($subNav);

    foreach ($subNav as $subnav_item) { ?>
        <li <?php if($active == $subnav_item['page_title']) print('class="active"');
        if(($i == $size) && ($size % 2 == 1)) print(' id="oddSubNav"'); ?>>
            <a href="<?php print (base_url('index.php/'.$subnav_item['name'].'/'.$subnav_item['page_title'])); ?>">
                <?php print (ucwords(str_replace('_', ' ', $subnav_item['page_title']))); ?>
            </a></li>
        <?php
        $i++;
        }

    if($this->uri->segment(1) === "weddings") {
        if($this->uri->segment(2) === "ambrosia_event_services" || $this->uri->segment(2) === "harvard_photography"
            || $this->uri->segment(2) === "caught_in_the_moment" || $this->uri->segment(2) === "nathan_nowack") {
        ?>
            <li id="oddSubNav" class="active">
        <?php
        } else {
            ?>
            <li id="oddSubNav">
            <?php
        }
    ?>
        <a href="<?php print (base_url('index.php/weddings/ambrosia_event_services/')); ?>">Galleries</a></li>
    <?php
    }
    ?>
    </ul>
    <?php
        if($todayHours){
            $open_time = date_format(date_create($todayHours["open_time"]), 'g:i A');
            $close_time = date_format(date_create($todayHours["close_time"]), 'g:i A');

            print("<span id='open-day'>Today's Hours: $open_time - $close_time </span>");
        } else{
            print("<span id='close-day'>The garden is closed today</span>");
        }
    ?>

</aside>