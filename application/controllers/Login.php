<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load_views("login/login_view");
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
    public function access(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $model = new LoginModel();
        $data = $model->verify_access($email,$password);
        if (isset($data)){
            $newdata = array(
                'username'  => $data[0]->firtsName.' '.$data[0]->lastName,
                'email'     => $data[0]->email,
                'logged_in' => TRUE,
                'status'    => $data[0]->status
            );
            $this->session->set_userdata($newdata);
            redirect("Subjects");
        }
    }
}