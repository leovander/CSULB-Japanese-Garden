<?php
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 5/4/14
 * Time: 2:28 PM
 */
?>

<table id="operating-hours-table">
    <caption>
        Admission is <strong>Free</strong>.  Regular Hours:
    </caption>
    <thead>
        <tr>
            <th>Day of Week</th>
            <th>Start Time</th>
            <th>End Time</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="3">

        </td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($daily_hours as $day): ?>
        <?php
        $day_of_week = $day['day_of_week'];
        $open = date_create($day['open_time']);
        $close = date_create($day['close_time']);

        ?>
        <tr>
            <td>
                <?php echo ucfirst($day_of_week) ?>
            </td>
            <td>
                <?php
                if ($day['closed'] == 1) {
                    echo "<strong>Closed</strong>";
                } else {
                    echo date_format($open, 'g:i A');
                }?>
            </td>
            <td>
                <?php
                if ($day['closed'] != 1) echo date_format($close, 'g:i A'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>