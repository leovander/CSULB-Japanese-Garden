<?php

/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 5/4/14
 * Time: 12:06 PM
 */
class Day_hours_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function getHours()
    {
        $query = $this->db->select('*')
            ->from('daily_hours')
            ->get();
        $days_of_week = $query->result_array();

        return $days_of_week;
    }

    function setHours()
    {

        $raw_data = $this->input->post();
        $days_of_week = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
        $data = array();


        for ($i = 0; $i < count($days_of_week); $i++) {
            $day = $days_of_week[$i];

            $data[$i] = array(
                'day_of_week' => $day,
                'open_time' => $raw_data[$day . '_open'],
                'close_time' => $raw_data[$day . '_close'],
                'closed' => empty($raw_data[$day . '_isclosed']) ? 0 : 1
            );
        }

        $this->db->update_batch('daily_hours', $data, 'day_of_week');

    }
}