<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

	}

    private function load_views(){
        $data = [];
        $data  = array(
            'header'        => $this->load->view('templates/header_view', $data, TRUE),
            'main'          => $this->load->view('templates/main_view', $data, TRUE),
            'footer'        => $this->load->view('templates/footer_view', $data, TRUE)
        );
        $this->load->view('layout_general_view', $data);
    }
}
