<?php
/*
 * Context:      Page model to query database of mainNav, subNav of the pages
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Israel Torres
 * Author #2:    Gyngai Ung
 * Date/Time:    3/20/14 4:30pm
 */

class Pages_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function get_mainNav()
    {
        $query = $this->db->query("SELECT c.name
                                    FROM categories c
                                   ORDER BY c.id ASC");

        return $query->result_array();
    }

    public function get_homeSubNav() {
        $query = $this->db->query("SELECT c.name, p.page_title
                                    FROM related_links rl
                                    INNER JOIN pages p on rl.link_id=p.id
                                    INNER JOIN categories c on p.parent_id=c.id
                                   WHERE rl.page_id = 1
                                   ORDER BY rl.p_order ASC;");
        return $query->result_array();
    }

    public function get_subNav($page_title = FALSE)
    {
        if (isset($page_title)) {
            $query = $this->db->query("SELECT c.name, p.page_title
                                           FROM pages p
                                           INNER JOIN categories c ON p.parent_id = c.id
                                            WHERE p.p_order IS NOT NULL AND p.parent_id =
                                                (SELECT page.parent_id FROM pages page
                                                WHERE page.page_title = '$page_title')
                                           ORDER BY p.p_order ASC");

            return $query->result_array();

        }
    }

    public function get_indexSubNav($index_title = FALSE)
    {
        if (isset($index_title)) {
            $query = $this->db->query("SELECT c.name, p.page_title FROM pages p
                                           INNER JOIN categories c ON p.parent_id = c.id
                                            WHERE p.p_order IS NOT NULL AND p.parent_id =
                                                (SELECT ce.id FROM categories ce
                                                WHERE ce.name = '$index_title')
                                        ORDER BY p.p_order ASC");
            return $query->result_array();
        }
    }

    public function get_subRelativeLinks($page_title = FALSE) {
        if (isset($page_title)) {
            $query = $this->db->query("SELECT c.name, p.page_title, rl.link_title
	                                    FROM related_links rl
	                                    INNER JOIN pages p on rl.link_id=p.id
	                                    INNER JOIN categories c on p.parent_id=c.id
                                       WHERE rl.page_id = (SELECT p1.id
						                                    FROM pages p1
					                                       WHERE p1.page_title='$page_title')
                                       ORDER BY rl.p_order ASC");

            return $query->result_array();

        }
    }

    public function get_indexRelativeLinks($index_title = FALSE) {
        if (isset($index_title)) {
            $query = $this->db->query("SELECT c.name, p.page_title, rl.link_title
	                                    FROM related_links rl
	                                    INNER JOIN pages p on rl.link_id=p.id
	                                    INNER JOIN categories c on p.parent_id=c.id
                                       WHERE rl.page_id= (SELECT p1.id
						                                    FROM pages p1
					                                      WHERE p1.page_title='index' AND p1.parent_id=(SELECT c.id
																										  FROM categories c
																										WHERE c.name='$index_title'))
                                       ORDER BY rl.p_order ASC;");
            return $query->result_array();
        }
    }
}