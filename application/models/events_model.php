<?php

/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 4/7/14
 * Time: 4:48 PM
 */
class Events_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function getAllEvents()
    {
        $query = $this->db->select('*')
            ->from('events')
            ->order_by('start', 'asc')
            ->get();

        $result = $query->result_array();

        return $result;
    }

    function getEvents($id = NULL)
    {
        if ($id === NULL) {
            $query = $this->db->select('*')
                ->from('events')
                ->where('closure', Null)
                ->order_by('start', 'asc')
                ->get();

            $result = $query->result_array();
        } else {
            $query = $this->db->select('*')
                ->from('events')
                ->where('id', $id)
                ->get();

            $result = $query->result_array();
        }

        return $result;
    }

    function getClosures()
    {
        $query = $this->db->select('*')
            ->from('events')
            ->where('closure', 1)
            ->order_by('start', 'asc')
            ->get();

        $result = $query->result_array();

        return $result;
    }


    function setEvent()
    {
        $id = $this->input->post('id');
        $closure = $this->input->post('closure') === 'true' ? 1 : NULL;

        $data = array(
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'photo' => $this->input->post('photo_url'),
            'closure' => $closure
        );

        if (isset($id) && $id !== 'undefined') {
            $this->db->where('id', $id);
            $this->db->update('events', $data);

            return $id;
        }

        $this->db->trans_start();
        $this->db->insert('events', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function deleteEvent($id)
    {
        $this->db->delete('events', array('id' => $id));
    }

    function todayHours()
    {
        $currentDate = new DateTime('now');
        $currentWeekDay = strtolower($currentDate->format('l'));
        $currentDate = $currentDate->format('Y-m-d');

        $where = "closure = 1 AND (DATE(`start`)<= DATE('$currentDate') AND date(`end`) >= DATE('$currentDate'))";

        $query = $this->db->select('*')
        ->from('events')
        ->where($where)
        ->get();

        $closed_today = !empty($query->result_array()[0]) ? TRUE : FALSE;

        $query1 = $this->db->select('*')
            ->from('daily_hours')
            ->where("day_of_week = '$currentWeekDay' AND `closed` = 0")
            ->get();

        $daily_hours_result = $query1->result_array();

        if(!$closed_today && !empty($daily_hours_result[0])){
            $result = $daily_hours_result[0];
        } else{
            $result = FALSE;
        }

        return $result;
    }
}
