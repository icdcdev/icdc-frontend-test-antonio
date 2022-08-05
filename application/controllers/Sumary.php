<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumary extends CI_Controller {
    public function index()
    {
        $this->load_views("sumary/sumary_view");
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
}