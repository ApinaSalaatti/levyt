<?php
class List_model extends CI_Model {

    public function __construct() {

    }

    public function getAll() {
        $query = $this->db->get('lists');
        return $query->result();
    }

    public function get($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get('lists');
        return $query->result();
    }

    public function add($data) {
        $this->db->insert('lists', $data);
        return $this->db->insert_id();
    }

    public function getRecords($listId) {
        $this->db->where('listId', $listId);
        $query = $this->db->get('liststorecords');
        $res = $query->result();
        $retval = array();
        foreach($res as $r) {
            $recId = $r->recordId;
            $this->db->where('id', $recId);
            $record = $this->db->get('records')->result();
            if(count($record) > 0) {
                $retval[] = $record[0];
            }
        }
        return $retval;
    }

    public function addRecordToList($listId, $recId) {
        $this->db->insert('liststorecords', array('listId' => $listId, 'recordId' => $recId));
    }

    public function delete($id) {
        $this->db->delete("lists", array("id" => $id));
    }
}