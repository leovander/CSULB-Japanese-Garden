<?php
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 4/9/14
 * Time: 6:42 PM
 */
?>


<table class="responsive-table" id="closure-table">
    <caption>The garden will be closed on the following dates:</caption>
    <thead>
        <tr>
            <th>Day of Week</th>
            <th>Date</th>
            <th>Occasion</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($closures as $closure): ?>
        <?php
        $start = date_create($closure['start']);
        $end = date_create($closure['end']);
        ?>
        <tr>
            <td>
                <?php echo date_format($start, 'l');
                if (date_format($start, 'F jS') !== date_format($end, 'F jS'))
                    echo ' - ' . date_format($end, 'l'); ?></td>
            <td>
                <?php echo date_format($start, 'M jS Y');
                if (date_format($start, 'M jS') !== date_format($end, 'M jS'))
                    echo ' - ' . date_format($end, 'M jS Y')?>
            </td>
            <td><?php echo $closure['title'] ?></td>
        </tr>


    <?php endforeach; ?>
    </tbody>
</table>

<!--#862d00-->