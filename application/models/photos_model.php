<?php
class Photos_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');

    }

    public function get_photos(){
        $query = $this->db->select('*')
            ->from('photos')
            ->get();

        $result = $query->result_array();

        return $result;
    }

    public function set_photo($finfo){
        $file_name = $finfo['file_name'];
        $url = site_url('assets/images/uploaded_images/'.$file_name);

        $data = array(
            'name' => $file_name,
            'url' => $url
        );

        $this->db->insert('photos', $data);

        $photo_data = ['name' => $file_name,
        'url' => $url ];

        return $photo_data;
    }

    public function delete_photo($file_name){
        $this->db->delete('photos', array('name' => $file_name));
    }
}