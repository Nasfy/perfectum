<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentator extends CI_Model {

    public function __construct() {
        $this->load->database();

    }

    public function get_current_page_comments($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('Comments');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total()
    {
        return $this->db->count_all('Comments');
    }

    public function putComment($data) {
        $this->db->insert('Comments', $data);
    }
}
