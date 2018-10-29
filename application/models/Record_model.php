<?php
class Record_model extends CI_Model {

    public function __construct() {

    }

    public function getAll() {
        $this->db->order_by('artist', 'ASC');
        $query = $this->db->get('records');
        return $query->result();
    }

    public function add($data) {
        $this->db->insert('records', $data);
        return $this->db->insert_id();
    }

    public function delete($id) {
        $this->db->delete("records", array("id" => $id));
    }
}