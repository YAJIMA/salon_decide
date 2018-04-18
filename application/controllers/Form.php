<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    public $data = array();

    private $params;
    private $extend_params;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Item_model');
        $this->load->helper('form');

        $this->data['title'] = '脱毛サロン';
        $this->data['nav'] = 'index';

        $this->params =  $this->Item_model->param_tree();
        $this->extend_params = $this->Item_model->extend_params();
    }

	public function index()
	{
        // header("Location: ".base_url("view"));exit();
		// $this->load->view('welcome_message');

        // パラメータ
        $this->data['params'] = $this->params;

        $this->load->view('header', $this->data);
        $this->load->view('headline', $this->data);
        $this->load->view('sidemenu', $this->data);
        $this->load->view('form', $this->data);
        $this->load->view('footer', $this->data);
	}
}
