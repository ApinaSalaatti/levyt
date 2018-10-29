<?php
class Lists extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Record_model', 'record', true);
        $this->load->model('List_model', 'list', true);

        $this->load->helper("url");
    }

    public function index() {
        $lists = $this->list->getAll();
        $this->load->view("header");
        $this->load->view('lists', array('lists' => $lists));
    }

    public function show($id) {
        $list = $this->list->get($id);
        if(count($list) > 0) {
            $name = $list[0]->name;
            $records = $this->list->getRecords($id);
            $this->load->view("header");
            $this->load->view("list", array('name' => $name, 'records' => $records));
        }
        else {
            echo "LISTAA EI LÖYTYNYT :--(";
        }
    }

    public function add() {
        $listData = $this->input->post("new-list");
        $listId = $this->list->add(array('name' => $listData['name']));
        foreach($listData['records'] as $rec) {
            $this->list->addRecordToList($listId, $rec);
        }

        echo $listId;
    }

    public function removeSong() {

    }


    public function delete() {
        $id = $this->input->post("list-id");
        $this->list->delete($id);
        redirect('lists');
    }
}