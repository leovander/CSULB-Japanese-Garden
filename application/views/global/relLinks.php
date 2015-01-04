<?php
/**
 * Created by PhpStorm.
 * User: itorres
 * Date: 5/1/14
 * Time: 7:33 PM
 */
if (!empty($relLinks)) {
?>

<section class="left-panel-links">
    <?php
        $active = $this->uri->segment(1);
        if($active === "weddings") {
            ?>
        <p>Wedding Galleries</p>
    <?php
        } else {
    ?>
        <p>Things that may interest you:</p>
    <?php
        }
    ?>
    <ul>
        <?php
        foreach($relLinks AS $relLink) {
            if($relLink['page_title'] === 'index') {
                ?>
                <li><a href="<?php print(base_url('index.php/'.$relLink['name'])); ?>">
                        <?php print($relLink['link_title']); ?>
                    </a>
                </li>
            <?php  } else { ?>
                <li><a href="<?php print(base_url('index.php/'.$relLink['name'].'/'.$relLink['page_title'])); ?>">
                        <?php print($relLink['link_title']); ?>
                    </a>
                </li>
            <?php
            }
        }
        ?>
    </ul>
</section>
<?php
}
//closing parent sections of left and right panels
?>
</section>