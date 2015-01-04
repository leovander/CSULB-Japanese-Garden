<?php
/**
 * Context:      Volunteer Model for the Volunteer Form in Japanese Garden
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai Ung
 * Date:         5/10/14
 * Time:         4:13 PM
 */
class Contactus_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_contacts() {
        $this->db->from('contact_us');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_message()
    {
        $data = array(
            'full_name'=> $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'comment' => $this->input->post('comment')
        );
        //'rate_our_website' name of table
        return $this->db->insert('contact_us', $data);
    }
}
?>