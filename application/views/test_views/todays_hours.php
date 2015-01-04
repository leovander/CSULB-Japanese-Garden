<?php
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 5/6/14
 * Time: 11:12 AM
 */
//echo $result ? 'YES' : 'NO';
if($result){
    $open_time = date_format(date_create($result["open_time"]), 'g:i A');
    $close_time = date_format(date_create($result["close_time"]), 'g:i A');

    Echo "Today's Hours are: $open_time - $close_time ";
} else{
    Echo "The garden is closed today";
}
