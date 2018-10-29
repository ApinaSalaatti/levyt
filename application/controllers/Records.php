<?php
class Records extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Record_model', 'record', true);

        $this->load->helper("url");
        $this->load->library('upload');
    }

    public function index() {
        $records = $this->record->getAll();
        $this->load->view("header");
        $this->load->view('recordlist', array('records' => $records));
    }

    public function add() {
        $rec = $this->input->post("record");
        $this->record->add($rec);
        redirect('records');
    }

    public function addFromFile() {
        if ( ! $this->upload->do_upload('records-file')) {
            echo "UH OH SOMETHING WENT WRONG!!";
            var_dump($this->upload->display_errors());
        }
        else {
            $lines = file($this->upload->data()['full_path']);
            foreach ($lines as $line) {
                $line = explode("\t", $line);
                $record = array(
                    "artist" => $line[0],
                    "name" => $line[1]
                );
                $this->record->add($record);
            }
            redirect("records");
        }
    }

    public function delete() {
        $id = $this->input->post("record-id");
        $this->record->delete($id);
        redirect('records');
    }
}