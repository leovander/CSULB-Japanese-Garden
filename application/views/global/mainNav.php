<?php
/* Created by Gyngai Ung
*  Date: 2014/3/20
*  Time: 3:52pm
*/
?>
<nav class="navigation">
    <ul>
        <?php
        $active = $this->uri->segment(1, 'home');
        foreach($mainNav AS $link) {
            if($link['name'] == 'home') {
                ?>
                <li <?php if($active == 'home') { print('class="active"'); } ?>><?php print(anchor('/', ucfirst($link['name']), 'title="'.ucfirst($link['name']).'"')); ?></li>
            <?php
            } else {
                ?>
                <li <?php if($active == $link['name']) { print('class="active"'); } ?>><?php print(anchor('index.php/'.$link['name'], ucfirst($link['name']), 'title="'.ucfirst($link['name']).'"')); ?></li>
            <?php
            }
        }
        ?>
    </ul>
</nav>