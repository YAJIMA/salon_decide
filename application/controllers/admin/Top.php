<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top extends CI_Controller {

    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');

        $this->data['title'] = '管理トップページ';
        $this->data['nav'] = 'top';
    }
    
    public function index()
    {
        if(! isset($_SESSION['login']) OR empty($_SESSION['login']))
        {
            header("Location: ".base_url("admin/login"));exit();
            //redirect ("/api/login");
        }
        $data = array('result'=>NULL);

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/top', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function regist()
    {
        $data = array('result'=>"");
        
        if(isset($_POST['username'],$_POST['email'],$_POST['password']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->user_model->regist($username, $email, $password);
            if ($result === TRUE)
            {
                $data['result'] = "success";
            }
            else
            {
                $data['result'] = $result;
            }
        }

        $this->load->view('admin/login_regist_form', $this->data);
    }
}
