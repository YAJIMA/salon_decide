<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array('result'=>NULL);
        $this->load->view('admin/login_form', $data);
    }

    public function logout()
    {
        $_loginstr = $this->session->userdata('login');
        $this->load->model('User_model');
        if( $this->User_model->signout($_loginstr) )
        {
            $this->session->unset_userdata('login');
        }
        header("Location: ".base_url("admin/login"));
        exit();
    }

    public function signin()
    {
        $data = array('result'=>"");
        $this->load->model('User_model');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->User_model->signin($username, $password);// ログイントークン
        //var_dump($result);
        if($result === FALSE)
        {
            // ログインNG
            $data['result'] = "login error!";
        }
        else
        {
            // ログインOK
            $data['result'] = "success!";
            $this->session->set_userdata(array('login'=>$result['token'], 'login_id'=>$result['login_id']));
            //$_SESSION['login'] = $result;

            header("Location: ".base_url("admin/top"));
            exit();
        }
        $this->load->view('admin/login_form', $data);
        //var_dump($_SESSION);
    }

    public function regist()
    {
        $data = array('result'=>"");

        if(isset($_POST['username'],$_POST['email'],$_POST['password']))
        {
            $this->load->model('User_model');
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->User_model->regist($username, $email, $password);
            if ($result === TRUE)
            {
                $data['result'] = "success";
            }
            else
            {
                $data['result'] = $result;
            }
        }

        $this->load->view('admin/login_regist_form', $data);
    }
}
