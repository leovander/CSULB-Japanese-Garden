<?php
/**
 * Created by PhpStorm.
 * User: Gyngai Ung
 * Date: 4/26/14
 * Time: 8:37 PM
 */
class Trees_model extends CI_Model {

    public function __construct () {
        $this -> load -> database ();
    }

    public function get_treelist ($map_num = FALSE) {
        if ($map_num === FALSE) {
            $query = $this->db->get('trees');
            return $query->result_array();
        }
        $query = $this->db->get_where('trees', array('map_num' => $map_num));
        return $query->row_array();
    }

    public function get_treelist_name ($map_num) {
        $sql = "SELECT botanical_name, common_name, status, notes FROM trees WHERE map_num = ?";
        $treeName = $this->db->query($sql, array($map_num));
        return $treeName->result_array();
    }

}
?>