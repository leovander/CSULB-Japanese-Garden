<?php
class Elements_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_element($id = FALSE)
    {
        if ($id === FALSE)
        {
            show_404();
        }


        $query = $this->db->get_where('elements', array('page_id' => $id));
        return $query->row_array();
    }
}