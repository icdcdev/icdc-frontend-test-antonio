<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SubjectModel');
        $this->load->library('session');
    }

    public function index()
    {
        $subject = new SubjectModel();
        $subjects_all = $subject->get_subjects_can_chose_user(1);
        $subjects_chosen = $subject->get_subjects_chosen_user(1);
        $this->load_views("subject/subject_view");
    }

    private function load_views($main)
    {
        $data = [];
        $data = array(
            'header' => $this->load->view('templates/header_view', $data, TRUE),
            'main' => $this->load->view($main, $data, TRUE),
            'footer' => $this->load->view('templates/footer_view', $data, TRUE)
        );
        $this->load->view('layout_general_view', $data);
    }

    public function add_subject()
    {
        $this->load_views("subject/subject_view");
    }
}