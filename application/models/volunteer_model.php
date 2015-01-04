<?php
/**
 * Context:      Volunteer Model for the Volunteer Form in Japanese Garden
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai Ung
 * Author #2:    Israel Torres
 * Date:         5/8/14
 * Time:         8:08 PM
 */

class Volunteer_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_volunteers() {
        $this->db->from('volunteers');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_volunteer()
    {
        $data = array(
            'volunteertype'=> $this->input->post('volunteertype'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zip' => $this->input->post('zip'),
            'homephone' => $this->input->post('homephone'),
            'cellphone' => $this->input->post('cellphone'),
            'email' => $this->input->post('email'),
            'comment' => $this->input->post('comment')
        );
        //'volunteers' name of table
        return $this->db->insert('volunteers', $data);
    }
}
?>