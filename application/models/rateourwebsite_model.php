<?php
/**
 * Context:      Volunteer Model for the Volunteer Form in Japanese Garden
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai Ung
 * Author #2:    Israel Torres
 * Date:         5/10/14
 * Time:         8:51 AM
 */

class Rateourwebsite_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_ratings() {
        $this->db->from('rate_our_website');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_websiterating()
    {
        $data = array(
            'full_name'=> $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'site_rating' => $this->input->post('site_rating'),
            'comment' => $this->input->post('comment')
        );
        //'rate_our_website' name of table
        return $this->db->insert('rate_our_website', $data);
    }
}
?>